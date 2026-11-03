<?php
require_once __DIR__ . '/includes/site.php';

$page_title       = 'Preise';
/* Preise und Testtage kommen aus den Konstanten in site.php. Frueher standen
   sie hier als Text – und waeren beim naechsten Preiswechsel in der Suche
   stehengeblieben, waehrend die Seite selbst schon etwas anderes zeigt. */
$page_title_full  = 'Preise: ab ' . PLANS['solo']['price'] . ' € im Monat, '
                  . TRIAL_DAYS . ' Tage gratis – Lerndex';
$page_h1          = 'Preise – ' . TRIAL_DAYS . ' Tage kostenlos testen';
$page_description = PLANS['solo']['price'] . ' € für ein Kind, ' . PLANS['duo']['price']
                  . ' € für zwei, ' . PLANS['family']['price'] . ' € für bis zu vier Kinder. '
                  . TRIAL_DAYS . ' Tage kostenlos testen, monatlich kündbar, keine Werbung.';
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
