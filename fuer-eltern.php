<?php
require_once __DIR__ . '/includes/site.php';

$page_title       = 'Für Eltern';
$page_title_full  = 'Lerndex für Eltern: jedes KI-Gespräch mitlesen';
$page_h1          = 'Gut begleitet lernen – und Sie sind immer dabei';
$page_lexi        = 'winkend';   // Illustration im Seitenkopf (page_hero.php)
$page_lead        = 'Lerndex erklärt Ihrem Kind den Schulstoff, motiviert mit Level und Belohnungen und zeigt Ihnen jederzeit, was passiert. Hier steht ohne Umwege, was die App tut – und was nicht.';
$page_description = 'Volle Einsicht in jedes Gespräch Ihres Kindes mit der KI, fünf Schutzschichten '
                  . 'und echte Lernzeit statt Bildschirmzeit. Werbefrei und DSGVO-konform.';
$canonical        = SITE_URL . '/fuer-eltern';
$current_page     = 'fuer-eltern';
$force_mode       = 'parents';

$page_jsonld = [[
    '@context' => 'https://schema.org',
    '@type'    => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Startseite', 'item' => SITE_URL . '/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Für Eltern', 'item' => SITE_URL . '/fuer-eltern'],
    ],
]];

include __DIR__ . '/includes/head.php';
include __DIR__ . '/includes/navbar.php';
?>

    <main id="main">
        <?php include __DIR__ . '/includes/sections/page_hero.php'; ?>
        <?php include __DIR__ . '/includes/sections/benefits.php'; ?>
        <?php include __DIR__ . '/includes/sections/audience_deep.php'; ?>
        <?php include __DIR__ . '/includes/sections/security.php'; ?>
        <?php include __DIR__ . '/includes/sections/home_start.php'; ?>
        <?php include __DIR__ . '/includes/sections/home_cta.php'; ?>
    </main>

<?php
include __DIR__ . '/includes/footer.php';
include __DIR__ . '/includes/foot.php';
