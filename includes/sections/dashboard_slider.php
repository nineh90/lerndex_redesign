<?php
require_once __DIR__ . '/../site.php';

$stages = [
    [
        'badge' => 'Klasse 1 & 2',
        'title' => 'Ohne Lesen bedienbar',
        'text'  => 'Große Symbole, wenig Text, Vorlesefunktion. Die Kleinsten starten allein.',
        'img'   => 'dashboard-klasse-1-2',
        'alt'   => 'Lerndex Dashboard für Klasse 1 und 2 mit großer Kachel Zahlen und Vorlesefunktion',
    ],
    [
        'badge' => 'Klasse 3 & 4',
        'title' => 'Lexi kommt dazu',
        'text'  => 'Fragen stellen, Fächer wählen, erste Statistiken. Streak und XP motivieren.',
        'img'   => 'dashboard-klasse-3-4',
        'alt'   => 'Lerndex Dashboard für Klasse 3 und 4 mit Level, Lernzeit, Streak und den Fächern Mathe, Deutsch, Englisch und Sachkunde',
    ],
    [
        'badge' => 'Klasse 5 bis ' . GRADE_MAX,
        'title' => 'Sieben Fächer, eigene Ziele',
        'text'  => 'Mathe, Deutsch, Englisch, Biologie, Chemie, Physik und Geschichte – Fächer lassen sich ein- und ausblenden.',
        'img'   => 'dashboard-weiterfuehrend',
        'alt'   => 'Lerndex Dashboard für weiterführende Schulen mit sieben Fächerkacheln und Level-Fortschritt',
    ],
];
?>
<section class="section dashboard-slider bg-light">
    <div class="container">

        <div class="section-header">
            <span class="badge">Mitwachsend</span>
            <h2>Ein Erstklässler braucht etwas anderes als ein Achtklässler</h2>
            <p>Deshalb sieht Lerndex auf jeder Stufe anders aus – gleiche App, passendes Dashboard.</p>
        </div>

        <div class="slider-wrapper">
            <div class="slider-track" id="slider-track">
                <?php foreach ($stages as $s): ?>
                    <div class="slide">
                        <div class="phone phone--md">
                            <picture>
                                <source srcset="/assets/images/screenshots/<?= e($s['img']) ?>.webp" type="image/webp">
                                <img src="/assets/images/screenshots/<?= e($s['img']) ?>.jpg"
                                     alt="<?= e($s['alt']) ?>"
                                     width="720" height="1600" loading="lazy" decoding="async">
                            </picture>
                        </div>
                        <div class="slide-content">
                            <span class="badge"><?= e($s['badge']) ?></span>
                            <h3><?= e($s['title']) ?></h3>
                            <p><?= e($s['text']) ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <button class="slider-btn slider-btn-prev" id="slider-prev" aria-label="Vorheriges Dashboard">
                <?php icon('chevron-left'); ?>
            </button>
            <button class="slider-btn slider-btn-next" id="slider-next" aria-label="Nächstes Dashboard">
                <?php icon('chevron-right'); ?>
            </button>
        </div>

        <div class="slider-dots">
            <?php foreach ($stages as $i => $s): ?>
                <button class="slider-dot<?= $i === 0 ? ' active' : '' ?>" data-index="<?= $i ?>"
                        aria-label="<?= e($s['badge']) ?>"></button>
            <?php endforeach; ?>
        </div>

    </div>
</section>
