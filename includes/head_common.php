<!-- Google Analytics – Consent Mode v2 -->
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        // Consent Mode v2 – im EWR sind alle vier Signale erforderlich.
        // Lerndex schaltet nur analytics_storage frei (siehe cookie_banner.php),
        // die Werbe-Signale bleiben dauerhaft auf denied.
        gtag('consent', 'default', {
            'analytics_storage': 'denied',
            'ad_storage': 'denied',
            'ad_user_data': 'denied',
            'ad_personalization': 'denied'
        });
    </script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-ENLVJT389T"></script>
    <script>
        gtag('js', new Date());
        gtag('config', 'G-ENLVJT389T', {
            'anonymize_ip': true
        });
    </script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Schrift wird selbst gehostet: kein Verbindungsaufbau zu Google Fonts -->
    <link rel="preload" href="/assets/fonts/plus-jakarta-sans-latin.woff2" as="font" type="font/woff2" crossorigin>

    <!-- Reihenfolge ist bedeutsam: Tokens vor allem anderen,
         Sections zuletzt (duerfen Komponenten ueberschreiben). -->
    <link rel="stylesheet" href="/assets/css/01-tokens.css">
    <link rel="stylesheet" href="/assets/css/02-base.css">
    <link rel="stylesheet" href="/assets/css/03-components.css">
    <link rel="stylesheet" href="/assets/css/04-layout.css">
    <link rel="stylesheet" href="/assets/css/05-sections.css">
    <link rel="stylesheet" href="/assets/css/06-hero.css">
