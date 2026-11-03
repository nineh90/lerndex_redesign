<?php
require_once __DIR__ . '/../site.php';

/**
 * Lexi als Sammelkarten – Trading-Card-Look, damit es auch Älteren gefällt.
 *
 * Jede „Fähigkeit“ ist eine echte Funktion der App:
 *   Erklärer   – Sokrates-Prinzip, Vorlesen in Klasse 1/2 (FAQ, Dashboard-Slider)
 *   Zauberer   – verrät keine Lösungen, Manipulationsschutz (sicherheit.php)
 *   Forscher   – Aufgabenblätter fotografieren (Stand-PDF, Teil 2)
 *   Motivator  – XP, 50 Level, Sterne, Erfolge, Streak, Belohnungen der Eltern
 * Den Glanz beim Drüberfahren setzt kids.js über --mx/--my.
 */
$karten = [
    [
        'nr' => '001', 'selten' => 'Legendär', 'farbe' => 'var(--game-yellow)',
        'bild' => 'winkend', 'w' => 476, 'h' => 512,
        'name' => 'Der Erklärer',
        'text' => 'Erklärt dir alles, so oft du willst. Klickt es beim ersten Mal nicht, erklärt Lexi es eben anders. In Klasse 1 und 2 liest Lerndex dir alles vor.',
        'werte' => [['Geduld', '∞'], ['Fächer', '8']],
        'alt' => 'Lexi winkt fröhlich mit beiden Armen',
    ],
    [
        'nr' => '002', 'selten' => 'Episch', 'farbe' => 'var(--game-pink)',
        'bild' => 'zauberer', 'w' => 436, 'h' => 512,
        'name' => 'Der Anti-Schummel-Zauberer',
        'text' => 'Die Lösung verraten? Kein Zauberspruch der Welt schafft das. Lexi stellt dir Fragen, bis du selbst draufkommst – auch Tricks laufen ins Leere.',
        'werte' => [['Spoiler', '0'], ['Tricks', '0']],
        'alt' => 'Lexi als Zauberer mit Sternenhut, Zauberstab und Buch',
    ],
    [
        'nr' => '003', 'selten' => 'Selten', 'farbe' => 'var(--game-cyan)',
        'bild' => 'forscher', 'w' => 436, 'h' => 512,
        'name' => 'Der Forscher',
        'text' => 'Fotografier dein Aufgabenblatt, statt es abzutippen. Lexi schaut es sich an und hilft dir, die Aufgabe zu verstehen.',
        'werte' => [['Kamera', '📸'], ['Abtippen', 'nö']],
        'alt' => 'Lexi als Forscher mit Schutzbrille, Klemmbrett und Reagenzglas',
    ],
    [
        'nr' => '004', 'selten' => 'Episch', 'farbe' => 'var(--game-lime)',
        'bild' => 'leuchtend', 'w' => 476, 'h' => 512,
        'name' => 'Der Motivator',
        'text' => 'XP, 50 Level, Sterne, Erfolge und deine Lern-Streak. Und deine Eltern legen echte Belohnungen fest – du siehst genau, was dir noch fehlt.',
        'werte' => [['Level', '50'], ['Streak', '🔥']],
        'alt' => 'Lexi mit leuchtender Glühbirne auf dem Doktorhut und magischem Leuchten',
    ],
];
?>
<section class="section kids-karten" id="lexi-karten" aria-labelledby="karten-titel">
    <div class="container">
        <div class="section-header">
            <span class="badge">Sammelkarten</span>
            <h2 id="karten-titel">Ein Lexi. Vier Superkräfte.</h2>
            <p>Fahr mit der Maus über die Karten – oder tipp sie an.</p>
        </div>

        <ul class="karten-raster reveal-stagger">
            <?php foreach ($karten as $k): ?>
                <li>
                    <article class="lexi-karte" style="--karte: <?= e($k['farbe']) ?>" data-karte tabindex="0">
                        <div class="karte-kopf">
                            <span class="karte-nr">#<?= e($k['nr']) ?></span>
                            <span class="karte-selten"><?= e($k['selten']) ?></span>
                        </div>
                        <div class="karte-bild">
                            <img src="/assets/images/lexi/lexi-<?= e($k['bild']) ?>-240.webp"
                                 srcset="/assets/images/lexi/lexi-<?= e($k['bild']) ?>-240.webp 240w, /assets/images/lexi/lexi-<?= e($k['bild']) ?>-<?= (int) $k['w'] ?>.webp <?= (int) $k['w'] ?>w"
                                 sizes="200px" width="<?= (int) $k['w'] ?>" height="<?= (int) $k['h'] ?>"
                                 alt="<?= e($k['alt']) ?>" loading="lazy" decoding="async">
                        </div>
                        <h3 class="karte-name"><?= e($k['name']) ?></h3>
                        <p class="karte-text"><?= e($k['text']) ?></p>
                        <dl class="karte-werte">
                            <?php foreach ($k['werte'] as [$wert, $zahl]): ?>
                                <div><dt><?= e($wert) ?></dt><dd><?= e($zahl) ?></dd></div>
                            <?php endforeach; ?>
                        </dl>
                        <span class="karte-glanz" aria-hidden="true"></span>
                    </article>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
