<?php
require_once __DIR__ . '/includes/site.php';

$page_title       = 'Für Kinder';
$page_title_full  = 'Lerndex für Kinder: mit Lexi lernen und XP sammeln';
$page_h1          = 'Hey! Das ist Lerndex';
$page_lead        = 'Eine App, in der Lernen sich nicht nach Hausaufgaben anfühlt. Hier steht, was du damit machen kannst.';
$page_description = 'Lexi erklärt dir alles, so oft du willst – und verrät nie die Lösung. Sammle XP, '
                  . 'steig im Level auf, schalte Avatare frei und halte deine Lern-Streak.';
$canonical        = SITE_URL . '/fuer-kinder';
$current_page     = 'fuer-kinder';
$force_mode       = 'kids';
$needs_quiz       = true;

$page_jsonld = [[
    '@context' => 'https://schema.org',
    '@type'    => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Startseite', 'item' => SITE_URL . '/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Für Kinder', 'item' => SITE_URL . '/fuer-kinder'],
    ],
]];

include __DIR__ . '/includes/head.php';
include __DIR__ . '/includes/navbar.php';
?>

    <main id="main">
        <?php include __DIR__ . '/includes/sections/page_hero.php'; ?>
        <?php include __DIR__ . '/includes/sections/audience_deep.php'; ?>
        <?php include __DIR__ . '/includes/sections/demo_quiz.php'; ?>
        <?php include __DIR__ . '/includes/sections/benefits.php'; ?>
        <?php include __DIR__ . '/includes/sections/dashboard_slider.php'; ?>
        <?php include __DIR__ . '/includes/sections/cta_download.php'; ?>
    </main>

<?php
include __DIR__ . '/includes/footer.php';
include __DIR__ . '/includes/foot.php';
