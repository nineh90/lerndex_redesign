<?php
require_once __DIR__ . '/includes/site.php';
require_once __DIR__ . '/includes/faq_data.php';

$page_title       = 'Häufige Fragen';
$page_description = 'Antworten zu Lerndex: Klassenstufen, Fächer, KI-Tutor, Eltern-Dashboard, '
                  . 'Datenschutz, Preise und Kündigung.';
$canonical        = SITE_URL . '/faq';
$current_page     = 'faq';

$page_jsonld = [
    faq_jsonld(),
    [
        '@context' => 'https://schema.org',
        '@type'    => 'BreadcrumbList',
        'itemListElement' => [
            ['@type' => 'ListItem', 'position' => 1, 'name' => 'Startseite', 'item' => SITE_URL . '/'],
            ['@type' => 'ListItem', 'position' => 2, 'name' => 'Häufige Fragen', 'item' => SITE_URL . '/faq'],
        ],
    ],
];

include __DIR__ . '/includes/head.php';
include __DIR__ . '/includes/navbar.php';
?>

    <main id="main">
        <?php include __DIR__ . '/includes/sections/page_hero.php'; ?>
        <?php include __DIR__ . '/includes/sections/faq.php'; ?>
    </main>

<?php
include __DIR__ . '/includes/footer.php';
include __DIR__ . '/includes/foot.php';
