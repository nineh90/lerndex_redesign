<?php
require_once __DIR__ . '/includes/site.php';

$page_title       = 'Funktionen';
$page_description = 'Alle Funktionen von Lerndex im Detail: KI-Tutor Lexi, Quizze für Klasse 1 bis 8, '
                  . 'Early-Learner-Modus mit Vorlesefunktion, Eltern-Dashboard, Aufgaben-Freigabe, '
                  . 'Belohnungen und Lernstatistiken.';
$canonical        = SITE_URL . '/funktionen';
$current_page     = 'funktionen';

$page_jsonld = [[
    '@context' => 'https://schema.org',
    '@type'    => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Startseite', 'item' => SITE_URL . '/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Funktionen', 'item' => SITE_URL . '/funktionen'],
    ],
]];

include __DIR__ . '/includes/head.php';
include __DIR__ . '/includes/navbar.php';
?>

    <main id="main">
        <?php include __DIR__ . '/includes/sections/page_hero.php'; ?>
        <?php include __DIR__ . '/includes/sections/features.php'; ?>
        <?php include __DIR__ . '/includes/sections/dashboard_slider.php'; ?>
        <?php include __DIR__ . '/includes/sections/cta_download.php'; ?>
    </main>

<?php
include __DIR__ . '/includes/footer.php';
include __DIR__ . '/includes/foot.php';
