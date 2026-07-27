<?php
require_once __DIR__ . '/../site.php';

/**
 * Zwei getrennte Kartensaetze. Eltern bekommen die Kaufargumente,
 * Kinder das, was die App fuer sie attraktiv macht – beide sachlich,
 * nur in unterschiedlicher Sprache und Reihenfolge.
 */
$parentCards = [
    ['bot', 'bg-purple', 'Erklärt statt vorzusagen',
     'Lexi führt zur Lösung, statt sie zu liefern. Ihr Kind versteht den Weg – und kann die nächste Aufgabe allein.'],
    ['eye', 'bg-blue', 'Sie sehen jedes Gespräch',
     'Alle Chats mit dem KI-Tutor sind einsehbar, auch nachträglich. Auffälliges wird automatisch markiert.'],
    ['shield-check', 'bg-green', 'Fünf Schutzschichten',
     'Themenfilter, Manipulationsschutz und altersgerechte Sprache greifen, bevor eine Antwort das Kind erreicht.'],
    ['clock', 'bg-orange', 'Echte Lernzeit, nicht Bildschirmzeit',
     'Gezählt wird nur aktives Arbeiten. Eine offene App im Hintergrund erzeugt keine Minuten.'],
    ['check-circle', 'bg-teal', 'Sie geben Aufgaben frei',
     'Fotografierte Hausaufgaben werden zu Übungen – aber erst, nachdem Sie sie freigegeben haben.'],
    ['lock', 'bg-purple', 'Werbefrei und DSGVO-konform',
     'Keine Werbung, keine Datenweitergabe, monatlich kündbar. Der Elternbereich ist PIN-geschützt.'],
];

$kidCards = [
    ['smile', 'bg-purple', 'Lexi nervt nie',
     'Frag so oft du willst. Lexi erklärt es nochmal – und nochmal anders, wenn du es noch nicht kapiert hast.'],
    ['zap', 'bg-orange', 'XP für alles, was du schaffst',
     'Jede richtige Antwort bringt XP. Genug davon und du steigst ein Level auf.'],
    ['palette', 'bg-blue', 'Avatare freischalten',
     'Neue Level bringen neue Avatare. Such dir aus, wie du in der App aussiehst.'],
    ['flame', 'bg-orange', 'Halte deine Streak',
     'Jeden Tag lernen heißt: die Flamme bleibt an. Einen Tag aussetzen und sie fängt von vorn an.'],
    ['gift', 'bg-green', 'Belohnungen von deinen Eltern',
     'Deine Eltern legen fest, was es gibt – Taschengeld, Spielzeit, ein Ausflug. Du siehst genau, was dir noch fehlt.'],
    ['volume-2', 'bg-teal', 'Vorlesen lassen',
     'Du magst nicht lesen? Lerndex liest dir alles vor. Klasse 1 und 2 kommen so ganz ohne Lesen aus.'],
];
?>
<section id="benefits" class="section benefits">
    <div class="container">

        <div class="section-header">
            <?php dual('<span class="badge">Für Eltern</span>', '<span class="badge">Für dich</span>'); ?>
            <?php dual('Warum Eltern sich für Lerndex entscheiden',
                       'Warum Lerndex nicht wie Hausaufgaben ist', 'h2'); ?>
            <?php dual(
                '<p>Sechs Gründe, die den Unterschied zu einer beliebigen Lern-App ausmachen.</p>',
                '<p>Lernen bleibt Lernen. Aber es fühlt sich anders an, wenn du dabei etwas freischaltest.</p>'
            ); ?>
        </div>

        <div class="benefits-grid reveal-stagger for-parents">
            <?php foreach ($parentCards as [$ic, $bg, $title, $text]): ?>
                <article class="benefit-card tilt">
                    <div class="icon-box <?= e($bg) ?>"><?php icon($ic); ?></div>
                    <h3><?= e($title) ?></h3>
                    <p><?= e($text) ?></p>
                </article>
            <?php endforeach; ?>
        </div>

        <div class="benefits-grid reveal-stagger for-kids">
            <?php foreach ($kidCards as [$ic, $bg, $title, $text]): ?>
                <article class="benefit-card tilt">
                    <div class="icon-box <?= e($bg) ?>"><?php icon($ic); ?></div>
                    <h3><?= e($title) ?></h3>
                    <p><?= e($text) ?></p>
                </article>
            <?php endforeach; ?>
        </div>

    </div>
</section>
