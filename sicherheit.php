<?php
require_once __DIR__ . '/includes/site.php';

$page_title       = 'Sicherheit';
$page_title_full  = 'Sicherheit: Wie Lerndex Kinder bei KI schützt';
$page_h1          = 'Wie Lerndex Ihr Kind im Umgang mit KI schützt';
$page_lead        = 'Ihr Kind spricht mit einer KI – und Sie sollen dabei ein gutes Gefühl haben. Fünf Schutzschichten halten Lexi beim Schulstoff, fertige Lösungen gibt es nicht, und Sie lesen jedes Gespräch mit.';
$page_lexi        = 'zauberer';   // Illustration im Seitenkopf (page_hero.php)
$page_description = 'Fünf Schutzschichten, Themenfilter und Manipulationsschutz: Lexi bleibt beim '
                  . 'Schulstoff und verrät keine Lösungen. Eltern lesen jedes Gespräch mit.';
$canonical        = SITE_URL . '/sicherheit';
$current_page     = 'sicherheit';

$page_jsonld = [[
    '@context' => 'https://schema.org',
    '@type'    => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Startseite', 'item' => SITE_URL . '/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Sicherheit', 'item' => SITE_URL . '/sicherheit'],
    ],
]];

include __DIR__ . '/includes/head.php';
include __DIR__ . '/includes/navbar.php';
?>

    <main id="main">
        <?php include __DIR__ . '/includes/sections/page_hero.php'; ?>
        <?php include __DIR__ . '/includes/sections/security.php'; ?>
        <?php include __DIR__ . '/includes/sections/security_detail.php'; ?>
        <?php include __DIR__ . '/includes/sections/home_cta.php'; ?>
    </main>

<?php
include __DIR__ . '/includes/footer.php';
include __DIR__ . '/includes/foot.php';
