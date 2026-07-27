<?php
require_once __DIR__ . '/../site.php';

/**
 * Feature-Rows. Reihenfolge folgt der Entscheidungsreise:
 * erst was das Kind erlebt, dann was die Eltern davon haben.
 *
 * Jede Row: Text links/rechts abwechselnd, Screenshot im Phone-Frame.
 */
$features = [
    [
        'id'      => 'quiz',
        'badge'   => 'Interaktives Lernen',
        'title'   => 'Quizze, die zur Klassenstufe passen',
        'text'    => 'Von der ersten Klasse bis Klasse ' . GRADE_MAX . ': Lerndex stellt Fragen auf dem
                      Niveau, das dein Kind gerade braucht. Jede richtige Antwort bringt XP,
                      jede falsche eine Erklärung – keine Sackgasse.',
        'list'    => ['Passt sich Klasse und Schulform an', 'Sofortiges Feedback statt nur richtig/falsch', 'Auswertung nach jeder Runde'],
        'img'     => 'quiz',
        'alt'     => 'Deutsch-Quiz in Lerndex mit der Frage nach dem grammatisch richtigen Satz und vier Antwortmöglichkeiten',
    ],
    [
        'id'      => 'tutor',
        'badge'   => 'KI-Lernbegleiter',
        'title'   => 'Lexi erklärt – und verrät nicht die Lösung',
        'text'    => 'Lexi ist kein Antwortautomat. Er führt Schritt für Schritt zum Ergebnis,
                      fragt nach und bleibt geduldig, auch beim fünften Anlauf. Am Ende hat dein
                      Kind es verstanden, nicht abgeschrieben.',
        'list'    => ['Erklärt in altersgerechter Sprache', 'Hilfe zur Selbsthilfe statt Lösungen', 'Bleibt strikt bei Schulthemen'],
        'img'     => 'lexi-chat',
        'alt'     => 'Chat mit dem KI-Tutor Lexi, der Photosynthese Schritt für Schritt in einfacher Sprache erklärt',
    ],
    [
        'id'      => 'early',
        'badge'   => 'Neu · Klasse 1 & 2',
        'title'   => 'Auch wer noch nicht liest, kommt allein zurecht',
        'text'    => 'Für die Kleinsten gibt es einen eigenen Modus: große Symbole, wenig Text und
                      eine Vorlesefunktion, die durch die App führt. Ihr Kind kann starten, ohne
                      dass jemand danebensitzen muss.',
        'list'    => ['Vorlesefunktion für alle Aufgaben', 'Große Flächen statt kleiner Buttons', 'Lernt Zahlen, Buchstaben und Formen'],
        'img'     => 'dashboard-klasse-1-2',
        'alt'     => 'Lerndex Dashboard für Klasse 1 und 2 mit großen Symbolen, Vorlesefunktion und der Kachel Zahlen',
    ],
    [
        'id'      => 'dashboard',
        'badge'   => 'Für Eltern',
        'title'   => 'Alle Kinder auf einen Blick',
        'text'    => 'Level, gesammelte XP, aktuelle Streak und die tatsächliche Lernzeit –
                      für jedes Kind, in Echtzeit. Gezählt wird nur aktives Lernen, nicht
                      offene Apps im Hintergrund.',
        'list'    => ['Bis zu 4 Kinder in einem Konto', 'Echte Lernzeit statt Bildschirmzeit', 'PIN-geschützter Elternbereich'],
        'img'     => 'eltern-dashboard',
        'alt'     => 'Eltern-Dashboard von Lerndex mit vier Kinderprofilen samt Level, XP, Streak und Lernzeit',
    ],
    [
        'id'      => 'freigabe',
        'badge'   => 'Neu · Für Eltern',
        'title'   => 'Hausaufgabe fotografieren, Aufgaben freigeben',
        'text'    => 'Ein Foto vom Arbeitsblatt genügt – die KI erstellt daraus passende Übungen.
                      Bevor Ihr Kind sie sieht, gehen sie über Ihren Tisch. Sie entscheiden,
                      was tatsächlich geübt wird.',
        'list'    => ['Foto wird automatisch ausgewertet', 'Freigabe liegt bei Ihnen', 'Fach und Niveau frei wählbar'],
        'img'     => 'eltern-ki-generator',
        'alt'     => 'KI-Aufgabengenerator in Lerndex mit Fachauswahl für Mathematik, Deutsch, Englisch, Biologie, Chemie, Physik und Geschichte',
    ],
    [
        'id'      => 'belohnung',
        'badge'   => 'Neu · Für Eltern',
        'title'   => 'Belohnungen, die zu Ihrer Familie passen',
        'text'    => 'Extra Taschengeld, längere Spielzeit oder ein gemeinsamer Ausflug: Sie legen
                      fest, was es gibt und wofür. Lerndex schaltet die Belohnung frei, sobald das
                      Ziel erreicht ist.',
        'list'    => ['Bedingung frei wählbar: Level, Streak oder XP', 'Eigene Belohnungen oder Avatare', 'Kind sieht das Ziel und den Fortschritt'],
        'img'     => 'eltern-belohnung-anlegen',
        'alt'     => 'Formular im Eltern-Dashboard zum Anlegen einer neuen Belohnung mit Titel, Art und Freigabe-Bedingung',
    ],
    [
        'id'      => 'statistik',
        'badge'   => 'Neu',
        'title'   => 'Fortschritt, den man wirklich sieht',
        'text'    => 'Level-Fortschritt, gesammelte XP, absolvierte Quizze und die Lernzeit pro Tag.
                      Kein Bauchgefühl, sondern Zahlen – für Ihr Kind zur Motivation, für Sie
                      als Überblick.',
        'list'    => ['Level-Fortschritt in Prozent', 'Quiz-Statistik mit Erfolgsquote', 'Lern-Streak als Tagesziel'],
        'img'     => 'schueler-statistiken',
        'alt'     => 'Statistikansicht in Lerndex mit Level-Fortschrittsring, gesammelten XP, Sternen und Lernzeit',
    ],
    [
        'id'      => 'avatare',
        'badge'   => 'Motivation',
        'title'   => 'Dranbleiben lohnt sich',
        'text'    => 'Wer regelmäßig lernt, sammelt XP, steigt Level auf und schaltet Avatare und
                      Belohnungen frei. Der Fortschritt ist jederzeit sichtbar – das trägt auch
                      durch Tage, an denen die Lust fehlt.',
        'list'    => ['XP- und Level-System über 50 Stufen', 'Freischaltbare Avatare', 'Streak für tägliches Lernen'],
        'img'     => 'schueler-belohnungen',
        'alt'     => 'Belohnungsübersicht in Lerndex mit einer noch gesperrten Belohnung und der Bedingung fünf Tage am Stück lernen',
    ],
];
?>
<section id="features" class="section features">
    <div class="container">

        <div class="section-header">
            <span class="badge">Funktionen</span>
            <h2>Was Lerndex kann</h2>
            <p>Alles, was Sie hier sehen, sind echte Bildschirme aus der App – keine Illustrationen.</p>
        </div>

        <?php foreach ($features as $i => $f): ?>
            <div class="feature-row<?= $i % 2 ? ' reverse' : '' ?>" id="feature-<?= e($f['id']) ?>">
                <div class="feature-text reveal <?= $i % 2 ? 'reveal--right' : 'reveal--left' ?>">
                    <span class="badge"><?= e($f['badge']) ?></span>
                    <h3><?= e($f['title']) ?></h3>
                    <p><?= e($f['text']) ?></p>
                    <?php if (!empty($f['list'])): ?>
                        <ul class="check-list">
                            <?php foreach ($f['list'] as $item): ?>
                                <li><?php icon('check-circle'); ?> <?= e($item) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>

                <div class="feature-image reveal reveal--scale">
                    <div class="phone phone--md">
                        <picture>
                            <source srcset="/assets/images/screenshots/<?= e($f['img']) ?>.webp" type="image/webp">
                            <img src="/assets/images/screenshots/<?= e($f['img']) ?>.jpg"
                                 alt="<?= e($f['alt']) ?>"
                                 width="720" height="1600" loading="lazy" decoding="async">
                        </picture>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</section>
