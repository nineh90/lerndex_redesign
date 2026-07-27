<?php
/**
 * Vorlage für config.php – diese Datei hier ist eingecheckt,
 * config.php selbst steht in .gitignore.
 *
 * Kopieren:  cp config.example.php config.php
 * und dann die Webhook-URLs aus n8n eintragen.
 */
return [
    // n8n-Webhook für /kontakt
    'n8n_contact' => '',

    // n8n-Webhook für /support (Bug-Meldungen).
    // Leer lassen, wenn beides über denselben Workflow laufen soll –
    // dann wird n8n_contact verwendet und das Feld "form" unterscheidet.
    'n8n_support' => '',

    // Optionaler gemeinsamer Header, falls der Webhook abgesichert ist
    'n8n_token'   => '',
];
