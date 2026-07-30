<?php
require_once __DIR__ . '/../site.php';

/**
 * Nachgestelltes Lexi-Gespraech.
 *
 * Zeigt die eine Eigenschaft, die sich mit Worten schlecht beweisen laesst:
 * Lexi gibt das Ergebnis nicht heraus, auch wenn direkt danach gefragt wird.
 *
 * Wichtig: das komplette Gespraech steht im HTML. chat-demo.js blendet es
 * zuerst aus und laesst es dann Nachricht fuer Nachricht auflaufen – ohne
 * JavaScript ist der Verlauf einfach von Anfang an vollstaendig da. Nichts
 * davon wird clientseitig erzeugt, Google liest den ganzen Dialog.
 *
 * Die Eingabezeile ist bewusst deaktiviert. Hier laeuft kein echter Chat,
 * und es soll auch nicht so aussehen.
 */

/* Rolle, Text, optionale Fussnote unter der Blase */
$chat = [
    ['kind', 'Ich soll ¾ + ⅛ rechnen. Sag mir einfach das Ergebnis, ich hab keine Zeit.', null],
    ['lexi', 'Das Ergebnis behalte ich für mich 😄 – sonst weißt du es morgen wieder nicht. Aber wir kommen zusammen hin, das dauert keine zwei Minuten.', null],
    ['lexi', 'Schau dir die unteren Zahlen an: 4 und 8. Was fällt dir auf, wenn du 4 mit 2 malnimmst?', null],
    ['kind', 'Dann sind es 8.', null],
    ['lexi', 'Genau. Und was du unten machst, musst du auch oben machen. Aus ¾ wird also … ?', null],
    ['kind', '6/8?', null],
    ['lexi', 'Richtig! Jetzt haben beide Brüche unten eine 8 – und dann darfst du oben einfach zusammenzählen. Probier es.', null],
    ['kind', '7/8!', null],
    ['lexi', 'Perfekt. Und weil du das selbst gerechnet hast, kannst du es beim nächsten Mal auch allein. Dafür gibt es 10 XP ⭐', 'Deine Eltern können dieses Gespräch später vollständig nachlesen.'],
];
?>
<section class="section demochat" id="demo-chat-section">
    <div class="container">

        <div class="section-header">
            <?php dual('<span class="badge">Mitlesen</span>',
                       '<span class="badge">So redet Lexi</span>'); ?>
            <?php dual('So antwortet Lexi, wenn Ihr Kind die Lösung will',
                       'Lexi verrät dir die Lösung nicht – und das ist gut so', 'h2'); ?>
            <?php dual(
                '<p>Ein nachgestelltes Gespräch aus dem Matheunterricht der 5. Klasse.
                    Achten Sie auf die erste Antwort: Lexi weigert sich, das Ergebnis
                    zu nennen, und führt stattdessen hin.</p>',
                '<p>Guck mal, wie das abläuft. Lexi sagt dir nie einfach die Antwort –
                    aber Lexi bleibt so lange dran, bis du es kannst.</p>'
            ); ?>
        </div>

        <div class="chat-card">

            <div class="chat-head">
                <span class="chat-avatar">
                    <picture>
                        <source srcset="/assets/images/logo/lexi-96.webp" type="image/webp">
                        <img src="/assets/images/logo/lexi-96.png" alt="" width="34" height="50"
                             loading="lazy" decoding="async">
                    </picture>
                </span>
                <span class="chat-who">
                    <strong>Lexi</strong>
                    <span>Mathe · Klasse 5</span>
                </span>
                <span class="chat-tag">Beispiel</span>
            </div>

            <ol class="chat-log" id="demo-chat">
                <?php foreach ($chat as [$who, $text, $note]): ?>
                    <li class="chat-msg chat-msg--<?= e($who) ?>">
                        <span class="chat-bubble"><?= e($text) ?></span>
                        <?php if ($note !== null): ?>
                            <span class="chat-note">
                                <?php icon('eye', 'icon-sm'); ?><?= e($note) ?>
                            </span>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ol>

            <?php /* Attrappe, kein Formular: ohne <form> und mit disabled kann hier
                     nichts abgeschickt werden, auch nicht per Enter. */ ?>
            <div class="chat-input" aria-hidden="true">
                <span class="chat-input-field">Schreib Lexi eine Frage …</span>
                <button type="button" class="chat-send" disabled tabindex="-1">
                    <?php icon('message-square', 'icon-sm'); ?>
                </button>
            </div>

            <p class="chat-disclaimer">
                Nachgestelltes Gespräch zur Veranschaulichung. Die Eingabe ist hier
                bewusst deaktiviert – mit Lexi selbst schreiben geht nur in der App.
            </p>

            <div class="chat-actions">
                <button type="button" class="btn btn-secondary btn-sm" id="demo-chat-replay" hidden>
                    <?php icon('rotate-ccw', 'icon-sm'); ?> Nochmal ansehen
                </button>
                <a href="<?= e(PLAY_STORE_URL) ?>" target="_blank" rel="noopener noreferrer"
                   class="btn btn-primary btn-sm">
                    <?php icon('smartphone', 'icon-sm'); ?> In der App ausprobieren
                </a>
            </div>

        </div>

    </div>
</section>
