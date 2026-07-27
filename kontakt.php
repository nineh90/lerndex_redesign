<?php
require_once __DIR__ . '/includes/site.php';

$page_title       = 'Kontakt';
$page_h1          = 'Schreib uns';
$page_lead        = 'Frage zur App, zum Abo oder zum Datenschutz? Wir antworten in der Regel innerhalb von zwei Werktagen.';
$page_description = 'Kontakt zu Lerndex: Fragen zur App, zum Abo, zum Datenschutz oder Presseanfragen.';
$canonical        = SITE_URL . '/kontakt';
$current_page     = 'kontakt';
$needs_forms      = true;

include __DIR__ . '/includes/head.php';
include __DIR__ . '/includes/navbar.php';
?>

    <main id="main">
        <?php include __DIR__ . '/includes/sections/page_hero.php'; ?>

        <section class="section formpage">
            <div class="container form-layout">

                <div class="form-side">
                    <h2>Direkter Draht</h2>
                    <p>Am schnellsten geht es per E-Mail:</p>
                    <p class="form-mail">
                        <?php icon('mail'); ?>
                        <a href="mailto:<?= e(SITE_MAIL) ?>"><?= e(SITE_MAIL) ?></a>
                    </p>

                    <div class="form-hintbox">
                        <?php icon('triangle-alert', 'icon-sm'); ?>
                        <p>Etwas funktioniert nicht wie erwartet? Dann hilft uns das
                           <a href="/support">Support-Formular</a> mehr – dort fragen wir gleich
                           Gerät und App-Version ab.</p>
                    </div>

                    <div class="form-hintbox">
                        <?php icon('circle-help', 'icon-sm'); ?>
                        <p>Viele Fragen sind schon in den <a href="/faq">häufigen Fragen</a>
                           beantwortet – schau gern zuerst dort.</p>
                    </div>
                </div>

                <form class="form-card" id="kontakt-form" data-form="kontakt" novalidate>
                    <div class="form-group">
                        <label for="k-name">Name <span aria-hidden="true">*</span></label>
                        <input type="text" id="k-name" name="name" autocomplete="name" required>
                    </div>

                    <div class="form-group">
                        <label for="k-email">E-Mail <span aria-hidden="true">*</span></label>
                        <input type="email" id="k-email" name="email" autocomplete="email" required>
                    </div>

                    <div class="form-group">
                        <label for="k-subject">Worum geht es? <span aria-hidden="true">*</span></label>
                        <select id="k-subject" name="subject" required>
                            <option value="" selected disabled>Bitte auswählen</option>
                            <option value="allgemein">Allgemeine Frage</option>
                            <option value="abo">Abo und Rechnung</option>
                            <option value="technik">Technische Frage</option>
                            <option value="datenschutz">Datenschutz</option>
                            <option value="presse">Presseanfrage</option>
                            <option value="sonstiges">Sonstiges</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="k-message">Nachricht <span aria-hidden="true">*</span></label>
                        <textarea id="k-message" name="message" required></textarea>
                    </div>

                    <div class="hp-field" aria-hidden="true">
                        <label for="k-website">Website (bitte frei lassen)</label>
                        <input type="text" id="k-website" name="website" tabindex="-1" autocomplete="off">
                    </div>

                    <div class="form-group checkbox-group">
                        <label class="checkbox-label" for="k-privacy">
                            <input type="checkbox" id="k-privacy" name="privacy" required>
                            <span>Ich habe die <a href="/datenschutz" target="_blank" rel="noopener">Datenschutzerklärung</a>
                                  gelesen und stimme der Verarbeitung meiner Angaben zu.</span>
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block btn-lg">Nachricht senden</button>
                    <div class="form-status" role="status" aria-live="polite"></div>
                </form>

            </div>
        </section>
    </main>

<?php
include __DIR__ . '/includes/footer.php';
include __DIR__ . '/includes/foot.php';
