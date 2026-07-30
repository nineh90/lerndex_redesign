<?php
/**
 * Einwilligungsbanner. Nur Markup – die Gestaltung steht in
 * 03-components.css, die Logik in assets/js/consent.js.
 *
 * Der Banner startet mit [hidden]. Ohne JavaScript wird Google Analytics
 * gar nicht geladen, dann waere die Frage sinnlos. consent.js nimmt das
 * Attribut nur weg, wenn noch keine Entscheidung gespeichert ist – so
 * blitzt der Banner bei Wiederkehrern nicht kurz auf.
 *
 * "Ablehnen" ist bewusst ein vollwertiger Button und keine graue Schrift:
 * die Ablehnung darf nicht schwerer zu finden sein als die Zustimmung.
 */
?>
<div id="cookie-banner" class="cookie-banner" role="region"
     aria-labelledby="cookie-banner-title" hidden>
    <div class="cookie-inner">
        <span class="cookie-icon" aria-hidden="true">🍪</span>
        <div class="cookie-text">
            <strong id="cookie-banner-title">Diese Webseite verwendet Cookies</strong>
            <p>
                Wir nutzen Analyse-Cookies, um zu verstehen, wie Besucher Lerndex entdecken –
                damit wir die App und die Webseite kontinuierlich verbessern können.
                Ohne Ihre Zustimmung wird Google Analytics nicht geladen.
                Mehr dazu in unserer <a href="/datenschutz">Datenschutzerklärung</a>.
            </p>
        </div>
        <div class="cookie-buttons">
            <button type="button" id="decline-cookies" class="btn btn-secondary btn-sm">Ablehnen</button>
            <button type="button" id="accept-cookies" class="btn btn-primary btn-sm">Akzeptieren</button>
        </div>
    </div>
</div>
