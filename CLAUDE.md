# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Was das hier ist

Die Marketing-Webseite von **lerndex.de** — der Produktseite zur Lerndex-App (KI-Lernapp für Kinder, **Klasse 1–8**, aktuell nur Android/Google Play). Die Seite wird gerade von einem langen Onepager zu einer mehrseitigen, interaktiven Produktseite umgebaut. Der vollständige Relaunch-Plan liegt in `~/.claude/plans/das-hier-ist-die-golden-flame.md`.

**Die Webseite ist nicht die App.** Schwester-Repos auf demselben Rechner:

| Pfad | Was |
|---|---|
| `../lerndex_app` | Die echte Lerndex-App (Flutter, Firebase, Vertex AI) — eigenes CLAUDE.md |
| `../lerndexgame` | „Lexis Lernwelt", Vanilla-JS-Canvas-Spiel mit Maskottchen Lexi — eigenes CLAUDE.md |
| `../lerndex` | Vorgänger-Arbeitsstand mit einem halbfertigen Umbau von Mai + `UMBAUPLAN.md`. **Nicht** aktiv weiterentwickeln; einzelne Teile werden bewusst hierher übernommen. |

Wenn eine Aussage über die App belegt werden muss (Features, Klassenstufen, KI-Verhalten), ist `../lerndex_app` die Quelle der Wahrheit — nicht der Webseitentext.

## Entwickeln

Es gibt **keinen Build-Schritt** und keine Abhängigkeiten. PHP-Includes, Vanilla CSS, Vanilla JS.

```bash
# Lokal starten — router.php bildet die .htaccess-Rewrites nach,
# damit /funktionen lokal genauso funktioniert wie live
php -S localhost:8000 router.php

# Ohne router.php funktionieren nur URLs mit .php-Endung
php -S localhost:8000

# Syntax-Check über alle PHP-Dateien
for f in *.php includes/*.php includes/sections/*.php api/*.php; do php -l "$f"; done

# Alle Routen auf 200 prüfen
for p in / /fuer-eltern /fuer-kinder /funktionen /sicherheit /preise /faq \
         /kontakt /support /impressum /datenschutz /agb; do
  printf '%-16s %s\n' "$p" "$(curl -s -o /dev/null -w '%{http_code}' localhost:8000$p)"
done
```

Es gibt keine Tests. Verifikation läuft über `php -l`, Durchklicken im Browser, Lighthouse und den Google Rich Results Test.

## Architektur

### Seitenaufbau

Jede Seite im Root ist eine eigenständige PHP-Datei, die vor dem Head ihre Metadaten als Variablen setzt und dann die gemeinsamen Includes zusammensteckt:

```php
<?php
$page_title       = 'Funktionen';
$page_description = '…';
$canonical        = 'https://lerndex.de/funktionen';
$current_page     = 'funktionen';   // markiert den aktiven Navbar-Link
$page_noindex     = false;          // true für rechtliche Seiten
include 'includes/head.php';
?>
<body>
<?php include 'includes/navbar.php'; ?>
<main>
  <?php include 'includes/sections/…'; ?>
</main>
<?php include 'includes/footer.php'; ?>
</body>
```

`includes/head.php` bindet immer `head_common.php` ein (Consent Mode + GA4 + Fonts) und entscheidet anhand von `$page_noindex`, ob `noindex` oder `canonical` + OG-Tags gesetzt werden. **Neue Seiten immer über diesen Weg anlegen** — nicht `head_index.php`/`head_legal.php` kopieren, die sind Altlast und verschwinden.

### Sections

`includes/sections/*.php` sind wiederverwendbare Inhaltsblöcke. Eine Section enthält **nur HTML** — kein `<style>`, kein `<script>`. Beides gehört nach `assets/css/` bzw. `assets/js/`. (Im Altbestand verstoßen `pricing.php` und `dashboard_slider.php` dagegen; das wird beim Anfassen mit aufgeräumt.)

### URLs

`.htaccess` erzwingt HTTPS, non-www, kein Trailing Slash und blendet `.php` aus. Intern **immer ohne Endung verlinken** (`/impressum`, nicht `impressum.php`) — für `*.php` gibt es einen 301 auf die Clean URL, jeder interne Link mit Endung erzeugt also einen unnötigen Redirect.

### CSS

Fünf Dateien in `assets/css/`, **in dieser Reihenfolge geladen** — sie bauen aufeinander auf:

| Datei | Inhalt |
|---|---|
| `01-tokens.css` | `@font-face`, Markenpalette, semantische Tokens, die beiden Modi |
| `02-base.css` | Reset, Typografie, Container, Utilities, Reveal-Animationen |
| `03-components.css` | Buttons, Cards, Badges, Phone-Frame, Formulare, Umschalter |
| `04-layout.css` | Navbar, mobiles Menü, Footer |
| `05-sections.css` | Seitenspezifische Blöcke inkl. Rechtsseiten |

**Keine Hex-Werte in Regeln** — alles über Tokens. Neue Farbe? Erst als Token in `01-tokens.css`.

Es gibt zwei Sätze semantischer Tokens: `--accent`, `--surface`, `--radius`, `--shadow`, `--gradient` usw. sind im Eltern-Modus so und im Kinder-Modus anders belegt. Eine Komponente, die nur diese Tokens benutzt, funktioniert automatisch in beiden Modi — genau das ist der Zweck. Die alten Namen (`--primary`, `--bg-light`, …) existieren weiter als Alias.

Wichtig: Die Aliase stehen bewusst auf `body`, nicht auf `:root`. Die Modus-Klasse hängt am `<body>`, und eine Custom Property löst dort auf, wo sie deklariert ist — auf `:root` würden die Kinder-Overrides ins Leere laufen.

### Eltern/Kinder-Modus

Die Startseite hat einen Umschalter zwischen Eltern- und Kinderansprache. **Beide Varianten stehen vollständig im HTML** und werden über `body.mode-parents` / `body.mode-kids` per CSS umgeschaltet (`.for-parents` / `.for-kids`) — nie per JS nachladen und nie indexierungsrelevanten Text nur clientseitig einfügen, sonst sieht Google die halbe Seite nicht. Die Auswahl liegt in `localStorage` unter `lerndex_audience`, Default ist **Eltern**.

Ein winziges Inline-Skript direkt nach dem `<body>`-Tag setzt den gemerkten Modus vor dem ersten Paint. Das muss inline und ohne `defer` bleiben, sonst blitzt kurz die falsche Variante auf.

Dazu gibt es `/fuer-eltern` und `/fuer-kinder` als eigenständige Vollseiten mit eigenen Keywords.

### Animationen

`.reveal`, `.reveal-stagger` und `.bar` werden von einem `IntersectionObserver` in `script.js` aktiviert. Die Startzustände (unsichtbar, verschoben) hängen an `html.js-anim` — diese Klasse setzt das Skript erst, wenn der Observer wirklich existiert. Ohne JS bleibt alles sichtbar statt unsichtbar hängen. **Dieses Muster bei neuen Animationen beibehalten.**

`prefers-reduced-motion: reduce` schaltet global alle Übergänge und Keyframes ab; Endzustände bleiben erhalten.

### Formulare

Browser → `POST /api/<name>.php` → n8n-Webhook. Der PHP-Proxy hält die Webhook-URL aus dem Quelltext, validiert serverseitig, prüft ein Honeypot-Feld und antwortet einheitlich mit `{ok: bool, message: string}`.

Webhook-URLs stehen in `config.php` — **gitignored**. Vorlage: `config.example.php`.

### Icons

Inline-SVG-Sprite über `includes/icons.php`, aufgerufen als `<?php icon('shield-check'); ?>`. Kein Lucide-CDN mehr — das war eine komplette Bibliothek von unpkg, die die Icons erst nach JS-Ausführung eingesetzt hat (Layout-Shift + US-Datentransfer).

## Konventionen

- **Alles auf Deutsch:** Seiteninhalte, Commit-Messages, Kommentare, Variablennamen in PHP-Templates.
- **Ansprache:** Eltern → „Sie". Kinder → „du". Innerhalb einer Section niemals mischen.
- **Nur belegbare Aussagen.** Die Seite stand monatelang mit falschen Klassenstufen und behaupteter iOS-Verfügbarkeit online. Bevor eine Produktaussage geschrieben wird: in `../lerndex_app` prüfen oder bei Nils nachfragen. Betrifft besonders Klassenstufen, Plattform-Verfügbarkeit, Preise, Serverstandorte und DSGVO-Aussagen — letztere stehen auch in `datenschutz.php` und müssen konsistent bleiben.
- **CSS:** Custom Properties in `:root` (`--primary: #4A1D96`, `--secondary: #7C3AED`, `--radius: 20px`, Schrift Plus Jakarta Sans). Neue Farben als Token ergänzen, keine Hex-Werte direkt in Regeln.
- **Animationen** immer gegen `@media (prefers-reduced-motion: reduce)` absichern.
- **Bilder:** WebP, feste `width`/`height` (gegen Layout-Shift), `loading="lazy"` außer im Hero.
- Analytics ist GA4 (`G-ENLVJT389T`) hinter Consent Mode. Der Cookie-Banner speichert die Entscheidung unter `lerndex_cookie_consent` in `localStorage`. Ohne Einwilligung darf kein Tracking-Request rausgehen.

## Rechtliches

`impressum.php`, `datenschutz.php`, `agb.php` sind `noindex`, gehören aber zu den wichtigsten Dateien im Repo — sie sind rechtlich bindend. Änderungen an Datenverarbeitung (neue Formulare, neue Dienste, neue Empfänger wie n8n) **müssen** in `datenschutz.php` nachgezogen werden.
