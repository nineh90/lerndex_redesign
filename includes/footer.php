<?php
require_once __DIR__ . '/site.php';
?>
<footer class="footer">
    <div class="container">
        <div class="footer-content">

            <div class="footer-brand">
                <div class="footer-logo">
                    <picture>
                        <source srcset="/assets/images/logo/lexi-96.webp" type="image/webp">
                        <img src="/assets/images/logo/lexi-96.png" alt="" class="logo-image-footer" width="30" height="44" loading="lazy">
                    </picture>
                    <span class="logo-word">Lerndex</span>
                </div>
                <p>Ein Bildungsprojekt von <a href="https://nils-digital.de" target="_blank" rel="noopener" class="brand-link">Nils-Digital</a></p>
                <p class="footer-tagline">Der sichere Lernbegleiter für Ihr Kind.</p>
            </div>

            <div class="footer-col">
                <h4>Seiten</h4>
                <ul>
                    <?php foreach (NAV_MAIN as [$label, $url]): ?>
                        <li><a href="<?= e($url) ?>"><?= e($label) ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Hilfe</h4>
                <ul>
                    <?php foreach (NAV_SUPPORT as [$label, $url]): ?>
                        <li><a href="<?= e($url) ?>"><?= e($label) ?></a></li>
                    <?php endforeach; ?>
                    <li><a href="mailto:<?= e(SITE_MAIL) ?>"><?= e(SITE_MAIL) ?></a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Rechtliches</h4>
                <ul>
                    <?php foreach (NAV_LEGAL as [$label, $url]): ?>
                        <li><a href="<?= e($url) ?>"><?= e($label) ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="footer-col footer-download" id="download">
                <h4>Jetzt herunterladen</h4>
                <div class="store-buttons">
                    <a href="<?= e(PLAY_STORE_URL) ?>" target="_blank" rel="noopener noreferrer" class="store-btn-placeholder">Google Play</a>
                    <?php if (IOS_AVAILABLE): ?>
                        <a href="<?= e(APP_STORE_URL) ?>" target="_blank" rel="noopener noreferrer" class="store-btn-placeholder">App Store</a>
                    <?php else: ?>
                        <span class="store-btn-placeholder is-soon" aria-disabled="true">App Store <span>in Vorbereitung</span></span>
                    <?php endif; ?>
                </div>
            </div>

        </div>

        <div class="footer-bottom">
            <p>&copy; <?= date('Y') ?> Lerndex. Powered by <a href="https://nils-digital.de" target="_blank" rel="noopener">Nils-Digital</a>. Alle Rechte vorbehalten.</p>
        </div>
    </div>
</footer>
