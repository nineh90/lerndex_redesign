<?php
require_once __DIR__ . '/../site.php';

/**
 * Hero der Startseite – lebendiger Stil (11-lebendig.css).
 *
 * Nur noch Elternansprache: die Startseite ist seit 03.11.2026 fest auf
 * Eltern ($force_mode in index.php), Kinder haben /fuer-kinder.
 *
 * Die schwebenden Hinweise sind Kurzfassungen belegter Funktionen:
 * Sokrates-Prinzip, Gesprächsverlauf im Eltern-Dashboard, 5 XP je
 * richtige Antwort (quiz_engine.dart).
 */
?>
<header class="hero-lebendig">
    <div class="aurora" aria-hidden="true">
        <span class="aurora-fleck aurora-fleck--lila"></span>
        <span class="aurora-fleck aurora-fleck--tuerkis"></span>
        <span class="aurora-fleck aurora-fleck--pfirsich"></span>
    </div>

    <div class="container hero-lebendig-inner">
        <div class="hero-lebendig-text">
            <a class="hero-neu" href="/fuer-schulen">
                <span class="hero-neu-marke">Neu</span>
                Lerndex für Schulen
                <?php icon('chevron-right', 'icon-sm'); ?>
            </a>

            <h1>
                KI-Nachhilfe, die Ihr Kind zum
                <span class="marker">Denken</span> bringt –
                <span class="text-gradient">nicht zum Abschreiben.</span>
            </h1>

            <p class="hero-lebendig-sub">
                Lexi erklärt geduldig, so oft Ihr Kind fragt, und führt mit Rückfragen
                zur Lösung, statt sie zu verraten. Und Sie sehen jederzeit, was gelernt
                und worüber gesprochen wurde. Für Klasse <?= GRADE_MIN ?> bis <?= GRADE_MAX ?>.
            </p>

            <div class="hero-lebendig-cta">
                <a href="<?= e(PLAY_STORE_URL) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-lg btn-leuchten">
                    <?php icon('smartphone'); ?> <?= TRIAL_DAYS ?> Tage gratis testen
                </a>
                <a href="#demo-chat-section" class="btn btn-secondary btn-lg">
                    <?php icon('message-square'); ?> Lexi live erleben
                </a>
            </div>

            <ul class="hero-trust">
                <li><?php icon('check', 'icon-sm'); ?> <?= TRIAL_DAYS ?> Tage kostenlos</li>
                <li><?php icon('check', 'icon-sm'); ?> Komplett werbefrei</li>
                <li><?php icon('check', 'icon-sm'); ?> DSGVO-konform</li>
                <li><?php icon('check', 'icon-sm'); ?> Monatlich kündbar</li>
            </ul>
        </div>

        <div class="hero-lebendig-buehne">
            <span class="buehne-sonne" aria-hidden="true"></span>

            <div class="phone hero-lebendig-phone" data-pointer="0.6">
                <picture>
                    <source srcset="/assets/images/screenshots/dashboard-klasse-3-4.webp" type="image/webp">
                    <img src="/assets/images/screenshots/dashboard-klasse-3-4.jpg"
                         alt="Lerndex Schülerdashboard für Klasse 3 und 4 mit Level, Lernzeit, Streak und den Fächern Mathe, Deutsch, Englisch und Sachkunde"
                         width="720" height="1600" loading="eager" fetchpriority="high" decoding="async">
                </picture>
            </div>

            <img class="hero-lebendig-lexi" src="/assets/images/lexi/lexi-leuchtend-476.webp"
                 srcset="/assets/images/lexi/lexi-leuchtend-240.webp 240w, /assets/images/lexi/lexi-leuchtend-476.webp 476w"
                 sizes="(min-width: 960px) 240px, 150px" width="476" height="512"
                 alt="Lexi, der Lernbegleiter von Lerndex" decoding="async" data-pointer="1.4">

            <div class="hinweis-chip hinweis-chip--1" data-pointer="1.8">
                <span class="hinweis-emoji" aria-hidden="true">💬</span>
                <span><strong>Fragt nach</strong> statt vorzusagen</span>
            </div>
            <div class="hinweis-chip hinweis-chip--2" data-pointer="2.2">
                <span class="hinweis-emoji" aria-hidden="true">👀</span>
                <span><strong>Sie lesen mit</strong> – jedes Gespräch</span>
            </div>
            <div class="hinweis-chip hinweis-chip--3" data-pointer="1.2">
                <span class="hinweis-emoji" aria-hidden="true">⭐</span>
                <span><strong>+5 XP</strong> pro richtiger Antwort</span>
            </div>
        </div>
    </div>

    <div class="welle welle--unten" aria-hidden="true"></div>
</header>
