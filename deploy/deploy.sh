#!/usr/bin/env bash
#
# Laeuft AUF DEM VPS. Wird von der GitHub-Action ueber SSH angestossen
# (.github/workflows/deploy.yml) – jeder Push auf main geht damit sofort live.
#
# Der dafuer hinterlegte Schluessel ist in /root/.ssh/authorized_keys per
# erzwungenem Kommando genau auf dieses Skript festgenagelt (ueber den Symlink
# /usr/local/bin/deploy-lerndex). Eine Shell bekommt man damit nicht, und er
# gilt nur fuer dieses Projekt. Gleiches Vorgehen wie bei nils-digital-web.
set -euo pipefail

# Der gesamte Ablauf steht in einer Funktion, die erst am Dateiende aufgerufen
# wird: "git reset --hard" ueberschreibt dieses Skript waehrend des Laufs, und
# Bash liest Skripte haeppchenweise. Eine Funktion ist vorher vollstaendig
# geparst. (Ausfuehrlich erklaert in nils-digital-aktuell/deploy/deploy.sh.)

main() {
    PROJEKT=/docker/lerndex
    LOG=/var/log/lerndex-deploy.log

    exec > >(tee -a "$LOG") 2>&1
    echo "=== $(date '+%Y-%m-%d %H:%M:%S') Deploy gestartet ==="

    cd "$PROJEKT"

    # reset --hard statt pull: hier soll exakt der Stand von origin/main liegen.
    git fetch --quiet origin main
    git reset --hard --quiet origin/main
    echo "→ Stand: $(git rev-parse --short HEAD) — $(git log -1 --pretty=%s)"

    cd "$PROJEKT/deploy"

    [ -f .env ] || { echo '✗ deploy/.env fehlt – Vorlage: deploy/.env.example' >&2; exit 1; }

    # ── DNS-Waechter ───────────────────────────────────────────
    # Traefik fordert fuer lerndex.de sofort ein Zertifikat an, sobald der
    # Container laeuft. Zeigt der Name noch zur alten Seite bei Strato,
    # scheitert das – und nach mehreren Fehlversuchen sperrt Let's Encrypt den
    # Namen. Deshalb: erst starten, wenn der A-Eintrag auf diesen Server zeigt
    # und kein AAAA-Eintrag mehr woanders hin fuehrt. Bis zum Umschalttag endet
    # jeder Deploy hier – ohne Fehler, der neue Stand liegt bereit.
    HOST=$(sed -n 's/^LERNDEX_PRUEFHOST=//p' .env | tail -1)
    HOST=${HOST:-lerndex.de}
    ZIEL=$(getent ahostsv4 "$HOST" | awk 'NR==1 {print $1}')
    if [ -z "$ZIEL" ] || ! ip -4 -o addr show | grep -qF " $ZIEL/"; then
        echo "→ $HOST zeigt auf ${ZIEL:-nichts}, nicht auf diesen Server – Container wird nicht gestartet."
        echo "  Erst nach der DNS-Umstellung bei Strato (deploy/README.md, Umschalttag)."
        exit 0
    fi
    if [ -n "$(getent ahostsv6 "$HOST" | awk '$1 ~ /:/ && $1 !~ /^::ffff:/ {print $1; exit}')" ]; then
        echo "✗ $HOST hat noch einen AAAA-Eintrag – bei Strato loeschen, sonst landet IPv6 auf der alten Seite." >&2
        exit 1
    fi

    docker compose up -d --build
    docker image prune -f >/dev/null

    echo "→ Warte auf den Container …"
    for i in $(seq 1 30); do
        [ "$(docker inspect -f '{{.State.Running}}' lerndex 2>/dev/null)" = 'true' ] && break
        [ "$i" = 30 ] && { echo '✗ Container laeuft nicht.' >&2; docker compose logs --tail 40 app >&2; exit 1; }
        sleep 2
    done

    HOST=$(docker exec lerndex printenv LERNDEX_PRUEFHOST)
    MODUS=$(docker exec lerndex printenv LERNDEX_MODUS)

    # ── Gegenprobe von innen ───────────────────────────────────
    # Direkt am Apache, mit dem Kopf, den Traefik setzt – sonst leitet die
    # HTTPS-Regel der .htaccess jede Anfrage um. Prueft Seiten UND die
    # 301-Weiterleitungen der alten URLs, die Google und die App kennen.
    pruefe() {   # pruefe <Pfad> <erwarteter Status>
        local code
        code=$(docker exec lerndex curl -s -o /dev/null -w '%{http_code}' \
                 -H "Host: $HOST" -H 'X-Forwarded-Proto: https' "http://localhost$1" || echo 000)
        if [ "$code" != "$2" ]; then
            echo "✗ $1 liefert $code statt $2" >&2
            FEHLER=1
        fi
    }
    FEHLER=0
    for p in / /fuer-eltern /fuer-kinder /funktionen /sicherheit /preise /faq \
             /kontakt /support /impressum /datenschutz /agb /sitemap.xml /robots.txt; do
        pruefe "$p" 200
    done
    for p in /index.php /impressum.php /datenschutz.php /agb.php /og-image.png; do
        pruefe "$p" 301
    done
    pruefe /includes/site.php 403
    pruefe /gibt-es-nicht 404
    if [ "$FEHLER" = 1 ]; then
        docker logs --tail 40 lerndex >&2
        exit 1
    fi
    echo "→ Alle Seiten und Weiterleitungen antworten wie erwartet."

    # ── Formular-Anbindung ─────────────────────────────────────
    # Ein leerer Webhook faellt sonst erst auf, wenn ein Elternteil schreibt
    # und eine Fehlermeldung sieht.
    if [ -z "$(docker exec lerndex printenv N8N_CONTACT || true)" ]; then
        echo '! N8N_CONTACT ist leer – /kontakt und /support antworten mit 503.' >&2
    fi

    # ── Sichtbarkeit fuer Google ───────────────────────────────
    # Ueber Traefik im Docker-Netz, NICHT ueber die oeffentliche Adresse: der
    # Server kann seinen eigenen Namen nicht aufloesen (kein Hairpin-NAT).
    # Mit Wiederholung, weil Traefik nach dem Neuanlegen ein paar Sekunden
    # braucht, bis der Router samt Middleware wieder steht.
    ROBOTS=''
    ANTWORT=''
    for _ in $(seq 1 10); do
        ANTWORT=$(docker run --rm --network n8n_default curlimages/curl:latest \
            -sI --max-time 10 --connect-timeout 5 \
            --connect-to "$HOST:443:n8n-traefik-1:443" \
            "https://$HOST/" 2>/dev/null || true)
        if echo "$ANTWORT" | grep -qE '^HTTP/[0-9.]+ 200'; then
            ROBOTS=$(echo "$ANTWORT" | grep -i '^x-robots-tag' || true)
            break
        fi
        ANTWORT=''
        sleep 3
    done

    if [ -z "$ANTWORT" ]; then
        echo "! Traefik liefert https://$HOST/ nicht aus – DNS oder Zertifikat pruefen." >&2
    elif [ "$MODUS" = produktion ]; then
        [ -z "$ROBOTS" ] && echo "→ Produktion: kein noindex, richtig." \
                         || echo "! WARNUNG: Produktion MIT noindex ($ROBOTS) – lerndex.de ist fuer Google unsichtbar." >&2
    else
        [ -n "$ROBOTS" ] && echo "→ Vorschau: noindex steht ($ROBOTS)." \
                         || echo "! WARNUNG: Vorschau OHNE noindex – die Baustelle kann indexiert werden." >&2
    fi

    echo "✓ Deploy fertig ($MODUS, $HOST)."
}

main "$@"
