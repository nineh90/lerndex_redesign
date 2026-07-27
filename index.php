<?php
require_once __DIR__ . '/includes/site.php';

$page_title_full  = 'Lerndex – KI-Nachhilfe App für Kinder | Mathe, Deutsch, Englisch lernen';
$page_description = 'Lerndex ist die sichere KI-Lernapp für Schüler der Klassen 1–8. Die KI erklärt statt Lösungen vorzugeben, passt sich Alter & Schulform an und bietet volle Eltern-Transparenz. Ein Bildungsprojekt von Nils-Digital.';
$canonical        = SITE_URL . '/';
$current_page     = 'home';

$page_jsonld = [
    [
        '@context' => 'https://schema.org',
        '@type'    => 'Organization',
        'name'     => 'Nils-Digital',
        'url'      => 'https://nils-digital.de',
        'logo'     => SITE_URL . '/assets/images/logo/icon-512.png',
        'founder'  => ['@type' => 'Person', 'name' => 'Nils Nehring'],
    ],
    [
        '@context' => 'https://schema.org',
        '@type'    => 'Brand',
        'name'     => 'Lerndex',
        'url'      => SITE_URL,
        'logo'     => SITE_URL . '/assets/images/logo/icon-512.png',
        'slogan'   => 'Lernen, das Kinder lieben. Kontrolle, die Eltern brauchen.',
        'isPartOf' => ['@type' => 'Organization', 'name' => 'Nils-Digital'],
    ],
    [
        '@context'            => 'https://schema.org',
        '@type'               => 'WebApplication',
        'name'                => 'Lerndex',
        'url'                 => SITE_URL,
        'applicationCategory' => 'EducationApplication',
        'operatingSystem'     => 'Android',
        'installUrl'          => PLAY_STORE_URL,
        'description'         => 'KI-gestützte Lernapp für Schüler der Klassen 1–8 mit personalisiertem Tutor, altersgerechter Sprache, Eltern-Dashboard und Gamification.',
        'inLanguage'          => 'de',
        'brand'               => ['@type' => 'Brand', 'name' => 'Lerndex'],
        'publisher'           => ['@type' => 'Organization', 'name' => 'Nils-Digital', 'url' => 'https://nils-digital.de'],
        'offers'              => array_values(array_map(static fn(array $p): array => [
            '@type'         => 'Offer',
            'name'          => $p['name'] . ' – ' . $p['children'],
            'price'         => $p['schema'],
            'priceCurrency' => 'EUR',
            'availability'  => 'https://schema.org/InStock',
            'url'           => SITE_URL . '/preise',
        ], PLANS)),
        'audience' => [
            '@type'           => 'EducationalAudience',
            'educationalRole' => 'student',
            'audienceType'    => 'Kinder im Schulalter (' . AGE_MIN . '–' . AGE_MAX . ' Jahre, Klasse ' . GRADE_MIN . '–' . GRADE_MAX . ')',
        ],
        'featureList' => [
            'KI erklärt statt Lösungen vorzugeben',
            'Alters- und schulformgerechte Anpassung',
            'Sieben Fächer: Mathe, Deutsch, Englisch, Biologie, Chemie, Physik, Geschichte',
            'Early-Learner-Modus mit Vorlesefunktion für Klasse 1–2',
            '5-Schichten-Kinderschutzsystem',
            'PIN-geschütztes Eltern-Dashboard',
            'Foto-Upload für neue Übungsaufgaben mit Eltern-Freigabe',
            'Auswertung der aktiven Lernzeit',
            'XP-, Level- und Avatar-System zur Motivation',
            'Frei definierbare Belohnungen durch die Eltern',
        ],
    ],
];

include __DIR__ . '/includes/head.php';
include __DIR__ . '/includes/navbar.php';
?>

    <main id="main">
        <?php include __DIR__ . '/includes/sections/hero.php'; ?>
        <?php include __DIR__ . '/includes/sections/benefits.php'; ?>
        <?php include __DIR__ . '/includes/sections/audience_deep.php'; ?>
        <?php include __DIR__ . '/includes/sections/dashboard_slider.php'; ?>
        <?php include __DIR__ . '/includes/sections/features.php'; ?>
        <?php /* Sicherheit direkt nach den Features: staerkstes Argument, bevor es um Geld geht */ ?>
        <?php include __DIR__ . '/includes/sections/security.php'; ?>
        <?php include __DIR__ . '/includes/sections/how_it_works.php'; ?>
        <?php include __DIR__ . '/includes/sections/target_group.php'; ?>
        <?php include __DIR__ . '/includes/sections/pricing.php'; ?>
        <?php include __DIR__ . '/includes/sections/faq.php'; ?>
        <?php /* testuser + contact: Beta-Wizard, wird in Phase 5 durch /kontakt und /support ersetzt */ ?>
        <?php include __DIR__ . '/includes/sections/testuser.php'; ?>
        <?php include __DIR__ . '/includes/sections/contact.php'; ?>
    </main>

<?php
include __DIR__ . '/includes/footer.php';
include __DIR__ . '/includes/foot.php';
