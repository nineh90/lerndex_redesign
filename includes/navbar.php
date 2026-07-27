<?php
/**
 * Einheitliche Navigation für alle Seiten.
 * Erwartet $current_page (Schlüssel aus NAV_MAIN / NAV_SUPPORT / NAV_LEGAL).
 */
require_once __DIR__ . '/site.php';
$current_page = $current_page ?? '';
?>
<a class="skip-link" href="#main">Zum Inhalt springen</a>

<nav class="navbar" aria-label="Hauptnavigation">
    <div class="container nav-container">
        <a href="/" class="logo" aria-label="Lerndex – zur Startseite">
            <picture>
                <source srcset="/assets/images/logo/lexi-96.webp 1x, /assets/images/logo/lexi-144.webp 1.5x" type="image/webp">
                <img src="/assets/images/logo/lexi-96.png" alt="" class="logo-image" width="33" height="48" fetchpriority="high">
            </picture>
            <span class="logo-word">Lerndex</span>
        </a>

        <div class="nav-links nav-links--desktop">
            <?php foreach (NAV_MAIN as $key => [$label, $url]): ?>
                <a href="<?= e($url) ?>"<?= $current_page === $key ? ' class="is-active" aria-current="page"' : '' ?>><?= e($label) ?></a>
            <?php endforeach; ?>
            <a href="<?= e(PLAY_STORE_URL) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary nav-cta">App holen</a>
        </div>

        <button class="menu-toggle" id="menu-toggle" aria-expanded="false" aria-controls="mobile-menu" aria-label="Menü öffnen">
            <span></span><span></span><span></span>
        </button>
    </div>
</nav>

<div class="menu-overlay" id="menu-overlay" hidden></div>

<div class="mobile-menu" id="mobile-menu" role="dialog" aria-modal="true" aria-label="Hauptnavigation" hidden>
    <div class="mobile-menu-head">
        <span class="mobile-menu-title">Menü</span>
        <button class="mobile-menu-close" id="menu-close" aria-label="Menü schließen">&times;</button>
    </div>

    <nav class="mobile-menu-links" aria-label="Seiten">
        <?php foreach (NAV_MAIN as $key => [$label, $url]): ?>
            <a href="<?= e($url) ?>"<?= $current_page === $key ? ' class="is-active" aria-current="page"' : '' ?>><?= e($label) ?></a>
        <?php endforeach; ?>
    </nav>

    <nav class="mobile-menu-links mobile-menu-links--secondary" aria-label="Hilfe">
        <?php foreach (NAV_SUPPORT as $key => [$label, $url]): ?>
            <a href="<?= e($url) ?>"<?= $current_page === $key ? ' class="is-active" aria-current="page"' : '' ?>><?= e($label) ?></a>
        <?php endforeach; ?>
    </nav>

    <nav class="mobile-menu-legal" aria-label="Rechtliches">
        <?php foreach (NAV_LEGAL as $key => [$label, $url]): ?>
            <a href="<?= e($url) ?>"><?= e($label) ?></a>
        <?php endforeach; ?>
    </nav>

    <a href="<?= e(PLAY_STORE_URL) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-block">App herunterladen</a>
</div>
