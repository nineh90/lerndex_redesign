/* ═══════════════════════════════════════════════════════════════
   EINWILLIGUNG UND ANALYTICS

   Google Analytics wird hier geladen – und nur hier. In head_common.php
   steht ausschliesslich der gtag-Stub mit allen Consent-Signalen auf
   "denied". Solange niemand zustimmt, geht damit kein einziger Request
   an Google raus, auch kein cookieloser.

   Die gtag-Aufrufe aus dem Head (js, config) liegen in dataLayer und
   werden abgearbeitet, sobald die Bibliothek nachgeladen ist. Genau so
   arbeitet auch das Standard-Snippet von Google.
   ═══════════════════════════════════════════════════════════════ */
(function () {
    'use strict';

    var GA_ID  = 'G-ENLVJT389T';
    var STORAGE = 'lerndex_cookie_consent';

    var banner  = document.getElementById('cookie-banner');
    var accept  = document.getElementById('accept-cookies');
    var decline = document.getElementById('decline-cookies');

    /* localStorage kann gesperrt sein (Privatmodus, strenge Einstellungen).
       Dann gilt: keine Einwilligung, kein Analytics – und der Banner
       erscheint bei jedem Aufruf erneut. */
    function read() {
        try { return localStorage.getItem(STORAGE); } catch (e) { return null; }
    }

    function write(value) {
        try { localStorage.setItem(STORAGE, value); } catch (e) { /* nichts zu tun */ }
    }

    var loaded = false;

    function loadAnalytics() {
        if (loaded) { return; }
        loaded = true;

        if (typeof window.gtag === 'function') {
            window.gtag('consent', 'update', { analytics_storage: 'granted' });
        }

        var s = document.createElement('script');
        s.async = true;
        s.src = 'https://www.googletagmanager.com/gtag/js?id=' + GA_ID;
        document.head.appendChild(s);
    }

    function hide() {
        if (banner) { banner.hidden = true; }
    }

    var saved = read();

    if (saved === 'accepted') {
        loadAnalytics();
        hide();
    } else if (saved === 'declined') {
        hide();
    } else if (banner) {
        banner.hidden = false;
    }

    if (accept) {
        accept.addEventListener('click', function () {
            write('accepted');
            loadAnalytics();
            hide();
        });
    }

    if (decline) {
        decline.addEventListener('click', function () {
            write('declined');
            hide();
        });
    }
})();
