<?php
require_once __DIR__ . '/../site.php';

/**
 * Schlanker Kopf für Unterseiten. Nimmt Titel und Text aus
 * $page_title / $page_lead, damit jede Seite nur ihre Variablen setzt.
 */
$lead = $page_lead ?? $page_description ?? '';
$crumb = $page_crumb ?? $page_title;
?>
<header class="page-hero">
    <div class="page-hero-bg" aria-hidden="true">
        <span class="blob blob-1" data-parallax="0.08"></span>
        <span class="blob blob-2" data-parallax="-0.05"></span>
    </div>

    <div class="container">
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
</header>
