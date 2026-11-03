<?php
require_once __DIR__ . '/includes/site.php';

$page_title       = 'Kontakt';
$page_h1          = 'Schreiben Sie uns';
$page_lead        = 'Frage zur App, zum Abo oder zum Datenschutz? Wir antworten in der Regel innerhalb von zwei Werktagen.';
$page_title_full  = 'Kontakt: Fragen zu App, Abo und Datenschutz – Lerndex';
$page_description = 'Fragen zur App, zum Abo, zum Datenschutz oder eine Presseanfrage? Schreiben Sie '
                  . 'uns – wir antworten in der Regel innerhalb von zwei Werktagen.';
$canonical        = SITE_URL . '/kontakt';
$current_page     = 'kontakt';

include __DIR__ . '/includes/head.php';
include __DIR__ . '/includes/navbar.php';
?>

    <main id="main">
        <?php include __DIR__ . '/includes/sections/page_hero.php'; ?>

        <section class="section formpage">
            <div class="container form-layout">

                <div class="form-side">
                    <h2>Am schnellsten per E-Mail</h2>
                    <p>Schreiben Sie uns einfach – zu Fragen rund um die App, das Abo, den Datenschutz
                       oder für Presseanfragen. Wir antworten in der Regel innerhalb von zwei Werktagen.</p>

                    <div class="form-hintbox">
                        <?php icon('triangle-alert', 'icon-sm'); ?>
                        <p>Etwas funktioniert nicht wie erwartet? Auf der <a href="/support">Support-Seite</a>
                           steht, welche Angaben uns bei einer Fehlermeldung am schnellsten weiterhelfen.</p>
                    </div>

                    <div class="form-hintbox">
                        <?php icon('circle-help', 'icon-sm'); ?>
                        <p>Viele Fragen sind schon in den <a href="/faq">häufigen Fragen</a>
                           beantwortet – schauen Sie gern zuerst dort.</p>
                    </div>
                </div>

                <div class="form-card">
                    <h2>E-Mail an Lerndex</h2>
                    <p class="form-mail">
                        <?php icon('mail'); ?>
                        <a href="mailto:<?= e(SITE_MAIL) ?>"><?= e(SITE_MAIL) ?></a>
                    </p>
                    <p>Bitte schicken Sie uns keine Daten Ihres Kindes, die wir für Ihr Anliegen nicht brauchen.
                       Für Fragen zu einem bestimmten Kinderprofil genügt der Vorname.</p>
                    <a class="btn btn-primary btn-block btn-lg" href="mailto:<?= e(SITE_MAIL) ?>">
                        <?php icon('mail', 'icon-sm'); ?> E-Mail schreiben
                    </a>
                </div>

            </div>
        </section>
    </main>

<?php
include __DIR__ . '/includes/footer.php';
include __DIR__ . '/includes/foot.php';
