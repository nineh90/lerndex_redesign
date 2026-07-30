<?php
require_once __DIR__ . '/../site.php';

/* Faecher – Reihenfolge wie im App-Dashboard */
$subjects = [
    ['Mathe',     '➗', 'bg-blue'],
    ['Deutsch',   '📖', 'bg-purple'],
    ['Englisch',  '🌍', 'bg-teal'],
    ['Sachkunde', '🌱', 'bg-green'],
    ['Biologie',  '🧬', 'bg-green'],
    ['Chemie',    '⚗️', 'bg-orange'],
    ['Physik',    '🧲', 'bg-blue'],
    ['Geschichte','🏛️', 'bg-orange'],
];

/* Gegenueberstellung fuer Eltern */
$compare = [
    ['Gibt sofort die fertige Lösung aus',        'Führt Schritt für Schritt hin, bis es sitzt'],
    ['Beantwortet jedes Thema, auch heikle',      'Bleibt strikt bei Schulfächern, alles andere wird abgelehnt'],
    ['Sie erfahren nie, worüber gesprochen wurde','Jedes Gespräch einsehbar, Auffälliges markiert'],
    ['Antwortet Zehnjährigen wie Erwachsenen',    'Sprache und Niveau richten sich nach Klasse und Schulform'],
    ['Finanziert sich über Daten oder Werbung',   'Werbefrei, DSGVO-konform, monatlich kündbar'],
];
?>

<!-- ══════════ NUR FÜR ELTERN ══════════ -->
<section class="section compare for-parents" id="fuer-eltern">
    <div class="container">
        <div class="section-header">
            <span class="badge">Der Unterschied</span>
            <h2>Warum nicht einfach ein normaler KI-Chat?</h2>
            <p>Die Frage ist berechtigt – Ihr Kind könnte jeden Chatbot fragen.
               Genau das ist das Problem.</p>
        </div>

        <?php /* Die Spaltenkoepfe sind reine Optik: sie erscheinen erst ab 800px,
                 wenn es tatsaechlich zwei Spalten gibt. Darunter tragen die Zellen
                 ihre Beschriftung selbst (.compare-tag). Fuer Screenreader ist
                 immer der Tag die Quelle – deshalb hier aria-hidden. */ ?>
        <div class="compare-head" aria-hidden="true">
            <span class="compare-label compare-label--bad">Beliebiger KI-Chat</span>
            <span class="compare-label compare-label--good">Lerndex</span>
        </div>

        <div class="compare-grid reveal-stagger">
            <?php foreach ($compare as [$bad, $good]): ?>
                <div class="compare-row">
                    <div class="compare-cell compare-cell--bad">
                        <span class="compare-tag">Beliebiger KI-Chat</span>
                        <span class="compare-claim">
                            <?php icon('circle-x', 'icon-sm'); ?>
                            <span><?= e($bad) ?></span>
                        </span>
                    </div>
                    <div class="compare-cell compare-cell--good">
                        <span class="compare-tag">Lerndex</span>
                        <span class="compare-claim">
                            <?php icon('check-circle', 'icon-sm'); ?>
                            <span><?= e($good) ?></span>
                        </span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- ══════════ NUR FÜR KINDER ══════════ -->
<section class="section kidsworld for-kids" id="fuer-kinder">
    <div class="container">

        <div class="section-header">
            <span class="badge">Deine Welt</span>
            <h2>Das wartet auf dich</h2>
            <p>Acht Fächer, ein Kumpel, der alles erklärt, und ein Level, das immer weiter geht.</p>
        </div>

        <div class="subject-grid reveal-stagger">
            <?php foreach ($subjects as [$name, $emoji, $bg]): ?>
                <div class="subject-tile <?= e($bg) ?> tilt">
                    <span class="subject-emoji" aria-hidden="true"><?= $emoji ?></span>
                    <strong><?= e($name) ?></strong>
                </div>
            <?php endforeach; ?>
        </div>
        <?php /* Genau so steht es in subject_config.dart der App: Klasse 3–4 hat
                 Sachkunde, ab Klasse 5 treten Biologie, Chemie, Physik und
                 Geschichte an dessen Stelle. Sachkunde kommt nicht dazu, es faellt
                 weg – acht Faecher gibt es also insgesamt, nie gleichzeitig. */ ?>
        <p class="subject-note">
            In der Grundschule lernst du Mathe, Deutsch, Englisch und Sachkunde.
            Ab Klasse 5 kommen Biologie, Chemie, Physik und Geschichte dazu –
            Sachkunde brauchst du dann nicht mehr.
        </p>

        <div class="lexi-intro reveal">
            <div class="lexi-avatar float">
                <picture>
                    <source srcset="/assets/images/logo/lexi-144.webp" type="image/webp">
                    <img src="/assets/images/logo/lexi-144.png" alt="Lexi, das Maskottchen von Lerndex"
                         width="98" height="144" loading="lazy" decoding="async">
                </picture>
            </div>
            <div class="lexi-bubble">
                <p>„Hey! Ich bin Lexi. Wenn du was nicht verstehst, frag mich einfach –
                   ich erkläre es dir so oft du willst. Und ich verrate dir nie einfach
                   die Lösung, sonst lernst du ja nichts."</p>
            </div>
        </div>

        <div class="level-ladder reveal">
            <h3>So kommst du weiter</h3>
            <ol class="ladder">
                <li>
                    <span class="ladder-step"><?php icon('target', 'icon-sm'); ?></span>
                    <div>
                        <strong>Quiz lösen</strong>
                        <span>Jede richtige Antwort bringt XP.</span>
                    </div>
                </li>
                <li>
                    <span class="ladder-step"><?php icon('zap', 'icon-sm'); ?></span>
                    <div>
                        <strong>Level aufsteigen</strong>
                        <span>Genug XP und du bist eine Stufe weiter. 50 gibt es insgesamt.</span>
                    </div>
                </li>
                <li>
                    <span class="ladder-step"><?php icon('palette', 'icon-sm'); ?></span>
                    <div>
                        <strong>Avatar freischalten</strong>
                        <span>Neue Level bringen neue Figuren zum Auswählen.</span>
                    </div>
                </li>
                <li>
                    <span class="ladder-step"><?php icon('gift', 'icon-sm'); ?></span>
                    <div>
                        <strong>Belohnung einlösen</strong>
                        <span>Was deine Eltern festgelegt haben – du siehst vorher, was es gibt.</span>
                    </div>
                </li>
            </ol>

            <div class="ladder-demo">
                <div class="ladder-demo-top">
                    <span>Level 2</span>
                    <span><strong>76</strong> / 80 XP</span>
                </div>
                <div class="bar" style="--bar-value: 95%"><span></span></div>
                <p class="ladder-demo-note">Noch 4 XP – ein einziges Quiz.</p>
            </div>
        </div>

    </div>
</section>
