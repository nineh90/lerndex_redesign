# Betrieb von lerndex.de

Die Seite läuft als Docker-Container auf dem Hostinger-VPS (`187.124.178.193`),
hinter dem Traefik des n8n-Stacks – genau wie nils-digital-web, Ticketsystem und
Adventsaktion. Die Domain bleibt bei Strato; dort wird nur DNS umgestellt.

```
Push auf main ─► GitHub Action (php -l + alle Seiten rendern)
              └► ssh root@VPS deploy-lerndex   (erzwungenes Kommando)
                   └► /docker/lerndex/deploy/deploy.sh
                        git reset --hard origin/main
                        docker compose up -d --build
                        prüft alle Seiten, alle 301 der alten URLs, noindex
```

**Jeder Push auf `main` ist sofort live.** Wer etwas ausprobieren will, arbeitet
auf einem Branch.

## Ablauf bis zum Wechsel

Die alte Seite bei Strato bleibt live, bis bei Strato der A-Eintrag umgestellt
wird. Bis dahin wird **lokal** getestet – mit demselben Abbild wie auf dem Server:

```bash
podman build -f deploy/Dockerfile -t lerndex:test .
podman run --rm -p 8089:80 localhost/lerndex:test
curl -sI -H 'X-Forwarded-Proto: https' -H 'Host: lerndex.de' localhost:8089/datenschutz.php
```

(Der Kopf `X-Forwarded-Proto: https` ersetzt Traefik; ohne ihn leitet die
`.htaccess` jede Anfrage auf HTTPS um.)

## Einmalige Einrichtung auf dem VPS

Container **noch nicht starten** – solange lerndex.de zu Strato zeigt, scheitert
das Zertifikat.

```bash
git clone https://github.com/nineh90/lerndex_redesign.git /docker/lerndex
cd /docker/lerndex/deploy
cp .env.example .env && chmod 600 .env     # N8N_TOKEN eintragen, s. n8n/README.md
ln -s /docker/lerndex/deploy/deploy.sh /usr/local/bin/deploy-lerndex

# Deploy-Schluessel nur fuer dieses Projekt, festgenagelt auf deploy-lerndex
ssh-keygen -t ed25519 -N '' -C lerndex-deploy -f /root/lerndex-deploy
echo "command=\"/usr/local/bin/deploy-lerndex\",no-agent-forwarding,no-port-forwarding,no-pty,no-X11-forwarding $(cat /root/lerndex-deploy.pub)" >> /root/.ssh/authorized_keys
```

Den privaten Schluessel als Repository-Secret hinterlegen und auf dem Server loeschen:
`VPS_SSH_KEY` (Inhalt von `/root/lerndex-deploy`), `VPS_HOST` = `187.124.178.193`.

Bis zum Wechsel startet `deploy.sh` den Container nicht: Der DNS-Waechter
sieht, dass lerndex.de noch zu Strato zeigt, und beendet den Deploy ohne
Fehler. Der Code liegt dann trotzdem aktuell auf dem Server bereit.

## Umschalttag

**1–2 Tage vorher:** bei Strato die TTL von `lerndex.de` und `www` auf das
Minimum setzen, damit der Wechsel schnell greift und notfalls schnell zurueck geht.

1. **Strato-DNS**
   - A `lerndex.de` und A `www.lerndex.de` → `187.124.178.193`
   - **AAAA-Eintraege von `lerndex.de` und `www` loeschen** (zeigen auf Strato,
     `2001:8d8:100f:f000::200`). Der VPS hat kein IPv6 – bleiben sie stehen,
     landen IPv6-Besucher und u. U. Googlebot weiter auf der alten Seite, und
     Let's Encrypt kann die Zertifikatspruefung ueber IPv6 scheitern lassen.
   - **Nicht anfassen:** MX (Google Workspace), TXT (`google-site-verification`
     – haelt die Search Console verifiziert –, SPF, Brevo, Firebase).
2. Warten, bis `dig +short lerndex.de` die VPS-Adresse und
   `dig +short lerndex.de AAAA` nichts mehr liefert.
3. Auf dem VPS `deploy-lerndex` (oder ein Push auf main). Der DNS-Waechter laesst
   den Start jetzt zu, Traefik holt das Zertifikat beim ersten Aufruf. Steht noch
   ein AAAA-Eintrag, bricht das Skript mit einem Hinweis ab.
   Ausgabe muss sagen: „Produktion: kein noindex, richtig."
4. Pruefen:
   ```bash
   for p in / /impressum.php /datenschutz.php /agb.php /og-image.png; do
     curl -s -o /dev/null -w "%{http_code} %{redirect_url}  $p\n" https://lerndex.de$p
   done
   curl -sI https://www.lerndex.de/datenschutz.php | grep -i location
   ```
5. **Search Console:** neue Sitemap `https://lerndex.de/sitemap.xml` einreichen,
   Startseite + `/funktionen` + `/fuer-eltern` per URL-Pruefung zur Indexierung
   anmelden. Die naechsten 2–3 Wochen den Bericht „Seitenindexierung" beobachten.
6. Rich Results Test fuer `/` und `/faq`.
7. **Altes Hosting bei Strato erst nach ~2 Wochen kuendigen** (DNS-Caches),
   **die Domain selbst bleibt bei Strato.**

Die Weiterleitungen, auf die es fuer Google und die App ankommt
(App und Play-Store-Eintrag verlinken `…/datenschutz.php`, `…/agb.php`,
`…/impressum.php`, teils mit `www.`), prueft `deploy.sh` bei jedem Deploy mit.

## Fehlersuche

```bash
tail -50 /var/log/lerndex-deploy.log
docker logs --tail 50 lerndex
```
