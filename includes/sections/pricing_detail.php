<?php require_once __DIR__ . '/../site.php'; ?>
<section class="section pricing-detail bg-light">
    <div class="container">

        <div class="pricing-split">
            <div class="pricing-split-text">
                <span class="badge">So läuft es ab</span>
                <h2>Erst testen, dann entscheiden</h2>
                <p>Die ersten <?= TRIAL_DAYS ?> Tage sind vollständig kostenlos – ohne gesperrte
                   Funktionen und ohne Testversion light. Sie wählen den Plan direkt in der App aus,
                   die Abrechnung läuft über Google Play.</p>
                <ul class="check-list">
                    <li><?php icon('check-circle'); ?> Keine Mindestlaufzeit, monatlich kündbar</li>
                    <li><?php icon('check-circle'); ?> Kündigung über den Play Store, kein Formular</li>
                    <li><?php icon('check-circle'); ?> Alle Funktionen in jedem Plan enthalten</li>
                    <li><?php icon('check-circle'); ?> Unterschied ist nur die Zahl der Kinderprofile</li>
                </ul>
                <a href="/faq" class="btn btn-secondary">Fragen zu Abo und Kündigung</a>
            </div>

            <div class="pricing-split-visual">
                <div class="phone phone--md">
                    <picture>
                        <source srcset="/assets/images/screenshots/screenshot_paywall.webp" type="image/webp">
                        <img src="/assets/images/screenshots/screenshot_paywall.jpeg"
                             alt="Abo-Auswahl in der Lerndex-App mit den Plänen Solo, Duo und Family sowie dem Hinweis auf 14 Tage kostenlos"
                             width="900" height="2001" loading="lazy" decoding="async">
                    </picture>
                </div>
            </div>
        </div>

    </div>
</section>
