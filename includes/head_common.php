<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Analytics – Consent Mode v2.
         Hier steht bewusst NUR der Stub. gtag/js wird erst von
         assets/js/consent.js nachgeladen, nachdem jemand zugestimmt hat –
         vorher geht kein Request an Google, auch kein cookieloser.
         Die Aufrufe unten warten bis dahin in dataLayer. -->
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        // Im EWR sind alle vier Signale erforderlich. Lerndex schaltet nur
        // analytics_storage frei, die Werbe-Signale bleiben dauerhaft denied.
        gtag('consent', 'default', {
            'analytics_storage': 'denied',
            'ad_storage': 'denied',
            'ad_user_data': 'denied',
            'ad_personalization': 'denied'
        });
        gtag('js', new Date());
        // Kein anonymize_ip: der Parameter stammt aus Universal Analytics und
        // wird von GA4 ignoriert. GA4 kuerzt die IP ohnehin selbst.
        gtag('config', 'G-ENLVJT389T');
    </script>

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
    <link rel="stylesheet" href="/assets/css/07-motion.css">
    <link rel="stylesheet" href="/assets/css/08-quiz.css">
    <link rel="stylesheet" href="/assets/css/09-pages.css">
