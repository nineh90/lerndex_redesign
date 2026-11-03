<?php
require_once __DIR__ . '/includes/site.php';

$page_title       = 'Funktionen';
$page_title_full  = 'Funktionen: KI-Tutor, Quiz und Eltern-Dashboard – Lerndex';
$page_h1          = 'Alles, was Lerndex kann – auf einen Blick';
$page_lead        = 'Quizze passend zur Klasse, ein KI-Tutor mit unendlich Geduld, ein Modus für Leseanfänger und ein Eltern-Dashboard mit allem Wichtigen. Alle Bilder stammen direkt aus der App.';
$page_lexi        = 'forscher';   // Illustration im Seitenkopf (page_hero.php)
$page_description = 'KI-Tutor Lexi, Quizze für Klasse 1 bis 8, Early-Learner-Modus mit Vorlesefunktion, '
                  . 'Eltern-Dashboard, Aufgaben-Freigabe, Belohnungen und Lernstatistiken.';
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
        <?php include __DIR__ . '/includes/sections/home_cta.php'; ?>
    </main>

<?php
include __DIR__ . '/includes/footer.php';
include __DIR__ . '/includes/foot.php';
