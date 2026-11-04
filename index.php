<?php
require_once __DIR__ . '/includes/site.php';

$page_title_full  = 'Lerndex: KI-Nachhilfe-App für Kinder, Klasse 1 bis 8';
$page_description = 'Die KI-Lernapp, die erklärt statt vorzusagen: Lexi begleitet Kinder der '
                  . 'Klassen 1–8 in Mathe, Deutsch und mehr. Eltern lesen jedes Gespräch mit.';
$canonical        = SITE_URL . '/';
$current_page     = 'home';
/* Die Startseite spricht immer Eltern an. Der Umschalter in die Kinderansicht
   ist entfallen (03.11.2026) – ohne ihn kaeme, wer frueher umgeschaltet hat und
   das noch im Browser gespeichert hat, nicht mehr zurueck. Fuer Kinder gibt es
   /fuer-kinder als eigene Seite. */
$force_mode       = 'parents';
$needs_quiz       = true;
$needs_chat       = true;
$feature_limit    = 3;      // Rest steht auf /funktionen
$faq_teaser       = true;   // alle Fragen auf /faq

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
        /* Lässt Google „Lerndex“ als Seitennamen in den Suchergebnissen zeigen */
        '@context'      => 'https://schema.org',
        '@type'         => 'WebSite',
        'name'          => 'Lerndex',
        'alternateName' => 'Lerndex – KI-Lernapp für Kinder',
        'url'           => SITE_URL . '/',
        'inLanguage'    => 'de',
    ],
    [
        '@context' => 'https://schema.org',
        '@type'    => 'Brand',
        'name'     => 'Lerndex',
        'url'      => SITE_URL,
        'logo'     => SITE_URL . '/assets/images/logo/icon-512.png',
        'slogan'   => 'Lernen, das Kinder lieben. Kontrolle, die Eltern brauchen.',
    ],
    [
        '@context'            => 'https://schema.org',
        '@type'               => 'MobileApplication',   // Android-App im Play Store, keine Web-App
        'name'                => 'Lerndex',
        'url'                 => SITE_URL,
        'applicationCategory' => 'EducationApplication',
        'operatingSystem'     => 'Android',
        'installUrl'          => PLAY_STORE_URL,
        'description'         => 'KI-gestützte Lernapp für Schüler der Klassen 1–8 mit personalisiertem Tutor, altersgerechter Sprache, Eltern-Dashboard und Gamification.',
        'inLanguage'          => 'de',
        'brand'               => ['@type' => 'Brand', 'name' => 'Lerndex'],
        'publisher'           => ['@type' => 'Organization', 'name' => 'Nils-Digital', 'url' => 'https://nils-digital.de'],
        /* priceSpecification sagt, dass der Preis pro Monat gilt. Ohne den
           Block steht in den strukturierten Daten nur "12.99 EUR" – das liest
           sich wie ein einmaliger Kaufpreis, und genau so kann Google es auch
           ausspielen. Der Abrechnungszeitraum steht in Monaten (unitCode MON). */
        'offers'              => array_values(array_map(static fn(array $p): array => [
            '@type'         => 'Offer',
            'name'          => $p['name'] . ' – ' . $p['children'],
            'price'         => $p['schema'],
            'priceCurrency' => 'EUR',
            'availability'  => 'https://schema.org/InStock',
            'url'           => SITE_URL . '/preise',
            'priceSpecification' => [
                '@type'            => 'UnitPriceSpecification',
                'price'            => $p['schema'],
                'priceCurrency'    => 'EUR',
                'billingIncrement' => 1,
                'referenceQuantity' => [
                    '@type'    => 'QuantitativeValue',
                    'value'    => 1,
                    'unitCode' => 'MON',
                ],
            ],
        ], PLANS)),
        'audience' => [
            '@type'           => 'EducationalAudience',
            'educationalRole' => 'student',
            'audienceType'    => 'Kinder im Schulalter (' . AGE_MIN . '–' . AGE_MAX . ' Jahre, Klasse ' . GRADE_MIN . '–' . GRADE_MAX . ')',
        ],
        'featureList' => [
            'KI erklärt statt Lösungen vorzugeben',
            'Alters- und schulformgerechte Anpassung',
            'Acht Fächer: Mathe, Deutsch, Englisch, Sachkunde (Grundschule), ab Klasse 5 Biologie, Chemie, Physik, Geschichte',
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
        <?php include __DIR__ . '/includes/sections/home_zahlen.php'; ?>
        <?php include __DIR__ . '/includes/sections/home_vorteile.php'; ?>
        <?php include __DIR__ . '/includes/sections/demo_quiz.php'; ?>
        <?php /* Direkt nach dem Quiz: dort hat man gerade eine Erklaerung gelesen,
                 hier sieht man, wie sie zustande kommt. */ ?>
        <?php include __DIR__ . '/includes/sections/demo_chat.php'; ?>
        <?php include __DIR__ . '/includes/sections/audience_deep.php'; ?>
        <?php include __DIR__ . '/includes/sections/dashboard_slider.php'; ?>
        <?php include __DIR__ . '/includes/sections/features.php'; ?>
        <?php /* Sicherheit direkt nach den Features: staerkstes Argument, bevor es um Geld geht */ ?>
        <?php include __DIR__ . '/includes/sections/security.php'; ?>
        <?php include __DIR__ . '/includes/sections/home_start.php'; ?>
        <?php include __DIR__ . '/includes/sections/pricing.php'; ?>
        <?php include __DIR__ . '/includes/sections/faq.php'; ?>
        <?php include __DIR__ . '/includes/sections/home_cta.php'; ?>
    </main>

<?php
include __DIR__ . '/includes/footer.php';
include __DIR__ . '/includes/foot.php';
