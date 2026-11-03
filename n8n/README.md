# n8n-Anbindung der Formulare

`lerndex-formulare.workflow.json` ist der Workflow hinter `/kontakt` und `/support`.
Ein Webhook für beide Formulare, ein Switch trennt sie intern anhand des Feldes `form`.

```
POST /api/submit.php  ──►  Webhook  ──►  Switch (form)
                                          ├─ kontakt ─┐
                                          └─ support ─┤
                                                      ├─► Gmail  → info@lerndex.de ─► Antwort „ok" an die Webseite
                                                      ├─► Telegram-Push
                                                      └─► Google Sheet (Archiv)
```

## Einrichten

**1. Importieren** — in n8n: *Workflows → … → Import from File* → diese JSON-Datei.

**2. Credentials setzen** (die drei Nodes sind ohne rot markiert):

| Node | Credential |
|---|---|
| Webhook Eingang | *Header Auth* — Name `Authorization`, Wert `Bearer <TOKEN>` |
| E-Mail an Lerndex | Gmail OAuth2 |
| Telegram-Push | Telegram-Bot-Token (via [@BotFather](https://t.me/BotFather)) |
| Ins Archiv-Sheet | Google Sheets OAuth2 |

Den `<TOKEN>` frei wählen (z. B. `openssl rand -hex 24`) — er muss gleich in
`config.php` unter `n8n_token` stehen.

**3. Platzhalter in den Nodes ersetzen:**

- `TELEGRAM_CHAT_ID_EINTRAGEN` — dem Bot einmal schreiben, dann
  `https://api.telegram.org/bot<TOKEN>/getUpdates` aufrufen und `chat.id` ablesen
- `GOOGLE_SHEET_ID_EINTRAGEN` — der Teil zwischen `/d/` und `/edit` in der Sheet-URL

Das Sheet braucht diese Kopfzeile, exakt so geschrieben:

```
Empfangen | Typ | Name | E-Mail | Betreff | Dringlichkeit | Details
```

**4. Workflow aktivieren**, dann die Produktions-URL des Webhook-Nodes kopieren
(`https://<n8n-host>/webhook/lerndex-formulare` — *nicht* die `/webhook-test/`-URL).

**5. Webseite verbinden** — auf dem VPS in `/docker/lerndex/deploy/.env`
(siehe `deploy/README.md`) `N8N_CONTACT` und `N8N_TOKEN` setzen. Lokal geht
alternativ `cp config.example.php config.php`, dann:

```php
return [
    'n8n_contact' => 'https://<n8n-host>/webhook/lerndex-formulare',
    'n8n_support' => '',   // leer lassen: derselbe Workflow, Switch trennt
    'n8n_token'   => '<TOKEN>',
];
```

Auf Vercel gibt es keine dauerhafte Datei neben dem Code — dort stattdessen die
Environment-Variablen `N8N_CONTACT` und `N8N_TOKEN` setzen (`N8N_SUPPORT` leer lassen).
`api/submit.php` liest beide Wege.

## Testen

```bash
curl -s -X POST localhost:8000/api/submit.php \
  -H 'Content-Type: application/json' \
  -d '{"form":"kontakt","name":"Test","email":"test@example.com",
       "subject":"allgemein","message":"Hallo","privacy":true}'
```

Erwartet: `{"ok":true,"message":"Danke! Wir melden uns."}`.
Bei `503` fehlt die Webhook-URL, bei `502` antwortet n8n mit einem Fehler —
dann in n8n unter *Executions* nachsehen.

Bug-Formular analog mit `"form":"support"` und den Pflichtfeldern
`device`, `os`, `appVersion`, `description`.

## Payload

Was `api/submit.php` schickt (Honeypot-Feld `website` ist entfernt):

```json
{
  "form": "kontakt",
  "data": { "name": "…", "email": "…", "subject": "…", "message": "…", "privacy": true },
  "meta": { "receivedAt": "2026-08-06T12:00:00+02:00", "userAgent": "…", "referer": "…" }
}
```

Bei `"form": "support"` enthält `data`: `device`, `os`, `appVersion`, `description`,
`privacy` sowie optional `steps`, `urgency` (`niedrig` · `mittel` · `hoch` · `kritisch`)
und `email`.

In n8n liegt das unter `{{ $json.body… }}`.

## Hinweise

- **Die Webseite meldet erst „Danke", wenn die Mail an info@lerndex.de raus ist.**
  Der Webhook antwortet über den Node *Antwort an Webseite*, der hinter dem
  Gmail-Node hängt. Scheitert der Versand, bekommt der Absender eine Fehlermeldung
  mit der Mailadresse – statt eines „Danke" für eine Anfrage, die nie ankommt.
  Telegram und Sheet laufen parallel und blockieren die Antwort nicht.
  `api/submit.php` wartet bis zu 10 s; Gmail braucht typisch 1–2 s.
- **Telegram bekommt keine personenbezogenen Daten** – nur „neue Anfrage, Thema X".
  Telegram ist ein Drittlanddienst ohne Auftragsverarbeitungsvertrag; Namen,
  Mailadressen und Nachrichtentexte von Eltern gehören dort nicht hin.
- **Webhook-URL auf dem VPS:** Webseite und n8n hängen im selben Docker-Netz
  (`n8n_default`). Deshalb die interne Adresse verwenden,
  `http://n8n:5678/webhook/lerndex-formulare` – die öffentliche Adresse ist vom
  Server aus nicht erreichbar (kein Hairpin-NAT), der Aufruf liefe ins Zeitlimit.
- **Discord statt Telegram:** den Telegram-Node löschen und einen
  *Discord*-Node mit Webhook-URL an dieselbe Stelle hängen, Text `{{ $json.telegram }}`.
- **Fehler-Workflow:** in n8n unter *Settings → Workflow* trotzdem eine
  Fehler-Benachrichtigung einrichten – sonst fällt ein kaputtes Sheet oder ein
  abgelaufener Telegram-Token niemandem auf.
- **Datenschutz:** sobald die Instanz steht, müssen Betreiber, Serverstandort und
  Speicherdauer in `datenschutz.php` Abschnitt 7a eingetragen werden — dort steht
  aktuell ein sichtbarer Platzhalter „Zu ergänzen".
