<?php
require_once __DIR__ . '/../site.php';

/**
 * Die Fächer als bunte Kacheln. Bewusst ohne erfundene Weltennamen – ein
 * Kind wuerde sie sonst in der App suchen.
 *
 * Quelle: subject_config.dart (_subjectsForGrade) – Grundschule vier Fächer,
 * ab Klasse 5 ersetzen Biologie, Chemie, Physik und Geschichte die Sachkunde.
 * Jede Welt bringt ihre eigene Farbe über --welt mit; die Farben sind Tokens.
 */
$welten_grundschule = [
    ['➗', 'Mathe', 'var(--brand-500)'],
    ['📖', 'Deutsch', 'var(--game-pink)'],
    ['🌍', 'Englisch', 'var(--sky)'],
    ['🌱', 'Sachkunde', 'var(--emerald)'],
];
$welten_ab5 = [
    ['🧬', 'Biologie', 'var(--game-lime)'],
    ['⚗️', 'Chemie', 'var(--game-cyan)'],
    ['🧲', 'Physik', 'var(--game-orange)'],
    ['🏛️', 'Geschichte', 'var(--game-yellow)'],
];
?>
<section class="section kids-welten" aria-labelledby="welten-titel">
    <div class="container">
        <div class="section-header">
            <span class="badge">Deine Welten</span>
            <h2 id="welten-titel">Acht Fächer. Eine App.</h2>
            <p>Lerndex wächst mit dir: In der Grundschule geht's um Mathe, Deutsch, Englisch und Sachkunde.
               Ab Klasse 5 kommen Biologie, Chemie, Physik und Geschichte dazu – statt Sachkunde.</p>
        </div>

        <p class="welten-stufe"><span>Grundschule</span></p>
        <ul class="welten-raster reveal-stagger">
            <?php foreach ($welten_grundschule as [$emoji, $fach, $farbe]): ?>
                <li class="welt" style="--welt: <?= e($farbe) ?>">
                    <span class="welt-emoji" aria-hidden="true"><?= $emoji ?></span>
                    <span class="welt-fach"><?= e($fach) ?></span>
                </li>
            <?php endforeach; ?>
        </ul>

        <p class="welten-stufe"><span>Ab Klasse 5</span></p>
        <ul class="welten-raster reveal-stagger">
            <?php foreach ($welten_ab5 as [$emoji, $fach, $farbe]): ?>
                <li class="welt" style="--welt: <?= e($farbe) ?>">
                    <span class="welt-emoji" aria-hidden="true"><?= $emoji ?></span>
                    <span class="welt-fach"><?= e($fach) ?></span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
