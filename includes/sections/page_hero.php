<?php
require_once __DIR__ . '/../site.php';

/**
 * Seitenkopf für Unterseiten im lebendigen Stil.
 *
 * Variablen der Seite:
 *   $page_h1 / $page_title   Überschrift
 *   $page_lead               Einleitung (sonst $page_description)
 *   $page_crumb              Brotkrumen-Text (sonst $page_title)
 *   $page_lexi               optional: winkend | leuchtend | zauberer | forscher
 */
$lead  = $page_lead ?? $page_description ?? '';
$crumb = $page_crumb ?? $page_title;

$lexi_bilder = [
    'winkend'   => [476, 'Lexi winkt fröhlich'],
    'leuchtend' => [476, 'Lexi mit leuchtender Glühbirne'],
    'zauberer'  => [436, 'Lexi als Zauberer mit Sternenhut'],
    'forscher'  => [436, 'Lexi als Forscher mit Klemmbrett'],
];
$lexi = isset($page_lexi, $lexi_bilder[$page_lexi]) ? $page_lexi : null;
?>
<header class="page-hero<?= $lexi ? ' page-hero--lexi' : '' ?>">
    <div class="aurora aurora--leise" aria-hidden="true">
        <span class="aurora-fleck aurora-fleck--lila"></span>
        <span class="aurora-fleck aurora-fleck--tuerkis"></span>
        <span class="aurora-fleck aurora-fleck--pfirsich"></span>
    </div>

    <div class="container page-hero-inner">
        <div class="page-hero-text">
            <nav class="crumbs" aria-label="Brotkrumen">
                <a href="/">Start</a>
                <?php icon('chevron-right', 'icon-sm'); ?>
                <span aria-current="page"><?= e($crumb) ?></span>
            </nav>

            <h1><?= e($page_h1 ?? $page_title) ?></h1>
            <?php if ($lead): ?>
                <p class="lead"><?= e($lead) ?></p>
            <?php endif; ?>
        </div>

        <?php if ($lexi): [$breite, $alt] = $lexi_bilder[$lexi]; ?>
            <div class="page-hero-lexi">
                <img src="/assets/images/lexi/lexi-<?= e($lexi) ?>-<?= $breite ?>.webp"
                     srcset="/assets/images/lexi/lexi-<?= e($lexi) ?>-240.webp 240w, /assets/images/lexi/lexi-<?= e($lexi) ?>-<?= $breite ?>.webp <?= $breite ?>w"
                     sizes="(min-width: 860px) 230px, 130px" width="<?= $breite ?>" height="512"
                     alt="<?= e($alt) ?>" decoding="async" fetchpriority="high">
            </div>
        <?php endif; ?>
    </div>
</header>
