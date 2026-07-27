<?php
require_once __DIR__ . '/includes/site.php';

$page_title       = 'Preise';
$page_description = 'Lerndex kostet 12,99 € für ein Kind, 24,99 € für zwei und 39,99 € für bis zu vier. '
                  . '14 Tage kostenlos testen, monatlich kündbar, keine Werbung.';
$canonical        = SITE_URL . '/preise';
$current_page     = 'preise';

$page_jsonld = [[
    '@context' => 'https://schema.org',
    '@type'    => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Startseite', 'item' => SITE_URL . '/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Preise', 'item' => SITE_URL . '/preise'],
    ],
]];

include __DIR__ . '/includes/head.php';
include __DIR__ . '/includes/navbar.php';
?>

    <main id="main">
        <?php include __DIR__ . '/includes/sections/page_hero.php'; ?>
        <?php include __DIR__ . '/includes/sections/pricing.php'; ?>
        <?php include __DIR__ . '/includes/sections/pricing_detail.php'; ?>
        <?php include __DIR__ . '/includes/sections/cta_download.php'; ?>
    </main>

<?php
include __DIR__ . '/includes/footer.php';
include __DIR__ . '/includes/foot.php';
