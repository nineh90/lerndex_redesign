<?php
/**
 * Einheitlicher <head> für alle Seiten.
 *
 * Jede Seite setzt vorher ihre Variablen und bindet dann diese Datei ein:
 *
 *   $page_title       Kurztitel, wird zu "<Titel> – Lerndex"
 *   $page_title_full  optional: vollständiger Titel ohne Suffix (Startseite)
 *   $page_description Meta-Description
 *   $canonical        vollständige URL, ohne Endung (z.B. /funktionen)
 *   $current_page     Schlüssel aus NAV_MAIN für die aktive Navbar-Markierung
 *   $page_noindex     true für rechtliche Seiten und 404
 *   $page_jsonld      optional: Array von JSON-LD-Objekten (als PHP-Arrays)
 *   $body_class       optional: zusätzliche Klassen am <body>
 */

require_once __DIR__ . '/site.php';
require_once __DIR__ . '/icons.php';

$page_title       = $page_title       ?? SITE_NAME;
$page_description = $page_description ?? '';
$current_page     = $current_page     ?? '';
$page_noindex     = $page_noindex     ?? false;
$canonical        = $canonical        ?? null;
$page_jsonld      = $page_jsonld      ?? [];
$og_image         = $og_image         ?? SITE_URL . '/assets/images/og-image.png';

$title = $page_title_full ?? ($page_title . ' – ' . SITE_NAME);
?>
<!DOCTYPE html>
<html lang="de">
<head>
<?php include __DIR__ . '/head_common.php'; ?>

    <title><?= e($title) ?></title>
    <meta name="description" content="<?= e($page_description) ?>">

<?php if ($page_noindex): ?>
    <meta name="robots" content="noindex, follow">
<?php else: ?>
    <meta name="robots" content="index, follow">
    <?php if ($canonical): ?>
    <link rel="canonical" href="<?= e($canonical) ?>">
    <?php endif; ?>

    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= e($canonical ?? SITE_URL) ?>">
    <meta property="og:title" content="<?= e($title) ?>">
    <meta property="og:description" content="<?= e($page_description) ?>">
    <meta property="og:image" content="<?= e($og_image) ?>">
    <meta property="og:locale" content="de_DE">
    <meta property="og:site_name" content="Lerndex by Nils-Digital">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= e($title) ?>">
    <meta name="twitter:description" content="<?= e($page_description) ?>">
    <meta name="twitter:image" content="<?= e($og_image) ?>">
<?php endif; ?>

    <meta name="author" content="Nils Nehring – Nils-Digital">
    <meta name="theme-color" content="#4A1D96">
    <meta name="geo.region" content="DE">

<?php foreach ($page_jsonld as $block): ?>
    <script type="application/ld+json"><?= json_encode($block, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?></script>
<?php endforeach; ?>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/assets/images/logo/favicon-32.png" sizes="32x32" type="image/png">
    <link rel="apple-touch-icon" href="/assets/images/logo/apple-touch-icon.png">
</head>
<body class="mode-parents <?= e($body_class ?? '') ?>">
<script>
    // Laeuft als erstes im Body, also vor dem ersten Paint: die gemerkte
    // Ansprache wird gesetzt, ohne dass kurz die falsche Variante aufblitzt.
    // Bewusst kein defer/extern – jede Verzoegerung waere sichtbar.
    (function () {
        try {
            if (localStorage.getItem('lerndex_audience') === 'kids') {
                document.body.classList.replace('mode-parents', 'mode-kids');
            }
        } catch (e) { /* localStorage gesperrt – Eltern-Modus bleibt */ }
    })();
</script>

<div class="scroll-progress" id="scroll-progress" aria-hidden="true"></div>
