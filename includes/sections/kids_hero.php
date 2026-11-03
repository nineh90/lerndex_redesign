<?php
require_once __DIR__ . '/../site.php';

/**
 * Startbildschirm der Kinderseite – wie der Titelbildschirm eines Spiels.
 *
 * Alles Wichtige steht als HTML im Quelltext (H1, Text, erste Sprechblase),
 * damit Google und Vorleseprogramme es ohne JavaScript sehen. kids.js tippt
 * die Sprechblase nur weiter und laesst Lexi auf Antippen antworten.
 *
 * Die Sterne werden hier mit festen Zufallswerten erzeugt (mt_srand), damit
 * sie bei jedem Aufruf an derselben Stelle sitzen – kein Springen im Cache.
 */
mt_srand(7);
$sterne = [];
for ($i = 0; $i < 46; $i++) {
    $sterne[] = sprintf('--x:%d%%;--y:%d%%;--s:%dpx;--d:%.1fs;--t:%.1fs',
        mt_rand(0, 100), mt_rand(0, 100), mt_rand(1, 3), mt_rand(0, 40) / 10, mt_rand(20, 50) / 10);
}

/* Was Lexi beim Antippen sagt. Fakten geprueft: Oktopus 3 Herzen, Honig
   verdirbt nicht. */
$lexi_sprueche = [
    'Psst … die Lösung verrate ich nicht. Aber ich bring dich hin!',
    'Noch eine Frage? Immer her damit. Ich werde nie ungeduldig.',
    'Wusstest du? Ein Oktopus hat drei Herzen. 🐙',
    'Mathe ist ein Rätsel. Und Rätsel kann man knacken. 🧩',
    'Fun Fact: Honig wird nicht schlecht – nicht mal nach Jahrhunderten. 🍯',
    'Level-up fühlt sich gut an, oder? ⭐',
    'Du hast mich angetippt! Das zählt leider nicht als XP. 😄',
    'Fehler sind nicht schlimm. Aus Fehlern lernt sogar ein Roboter.',
];
?>
<section class="kids-hero" aria-labelledby="kids-hero-titel">
    <div class="kids-sky" aria-hidden="true">
        <?php foreach ($sterne as $stil): ?>
            <span class="stern" style="<?= e($stil) ?>"></span>
        <?php endforeach; ?>
        <span class="nebel nebel-1"></span>
        <span class="nebel nebel-2"></span>
    </div>

    <div class="container kids-hero-inner">

        <div class="kids-hero-text">
            <p class="kids-eyebrow"><span>Lerndex</span> für Kinder &amp; Jugendliche · Klasse <?= GRADE_MIN ?>–<?= GRADE_MAX ?></p>
            <h1 id="kids-hero-titel">
                Lernen.<br>
                Leveln.<br>
                <span class="kids-glitzer">Mit Lexi.</span>
            </h1>
            <p class="kids-lead">
                Lexi erklärt dir alles – so oft du willst. Die Lösung verrät Lexi nie,
                aber bringt dich hin. Dafür gibt's XP, Level und Belohnungen.
            </p>
            <div class="kids-hero-actions">
                <a href="#demo-quiz-section" class="btn-game btn-game--gelb">
                    <?php icon('target'); ?> Quiz starten
                </a>
                <a href="#lexi-karten" class="btn-game btn-game--glas">
                    <?php icon('sparkles'); ?> Was Lexi kann
                </a>
            </div>
            <p class="kids-hero-note"><?php icon('check', 'icon-sm'); ?> Keine Anmeldung · nichts wird gespeichert</p>
        </div>

        <div class="kids-stage">
            <div class="kids-ring" aria-hidden="true"></div>

            <div class="kids-bubble" role="status" aria-live="polite">
                <span data-lexi-text>Hi! Ich bin Lexi. Tipp mich an!</span>
            </div>

            <button type="button" class="kids-lexi" data-lexi
                    data-sprueche="<?= e(json_encode($lexi_sprueche, JSON_UNESCAPED_UNICODE)) ?>"
                    aria-label="Lexi antippen – Lexi sagt etwas">
                <img src="/assets/images/lexi/lexi-leuchtend-476.webp"
                     srcset="/assets/images/lexi/lexi-leuchtend-240.webp 240w, /assets/images/lexi/lexi-leuchtend-476.webp 476w"
                     sizes="(min-width: 960px) 380px, 260px"
                     width="476" height="512" alt="Lexi, der Lernroboter von Lerndex, mit Doktorhut und leuchtender Glühbirne"
                     fetchpriority="high" decoding="async">
            </button>

            <span class="hud hud--xp" aria-hidden="true">+5 XP</span>
            <span class="hud hud--streak" aria-hidden="true">🔥 7 Tage</span>
            <span class="hud hud--level" aria-hidden="true">🔍 Level 12</span>
            <span class="hud hud--stern" aria-hidden="true">⭐⭐⭐</span>
        </div>

    </div>

    <div class="kids-hero-wave" aria-hidden="true"></div>
</section>
