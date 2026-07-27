<?php
require_once __DIR__ . '/includes/site.php';

$page_title       = 'Support';
$page_h1          = 'Etwas funktioniert nicht?';
$page_lead        = 'Beschreib uns möglichst genau, was passiert ist – je mehr wir wissen, desto schneller ist es behoben.';
$page_description = 'Fehler in der Lerndex-App melden: Gerät, App-Version und Beschreibung angeben, wir kümmern uns darum.';
$canonical        = SITE_URL . '/support';
$current_page     = 'support';
$needs_forms      = true;

include __DIR__ . '/includes/head.php';
include __DIR__ . '/includes/navbar.php';
?>

    <main id="main">
        <?php include __DIR__ . '/includes/sections/page_hero.php'; ?>

        <section class="section formpage">
            <div class="container form-layout">

                <div class="form-side">
                    <h2>Erst kurz prüfen</h2>
                    <p>Diese drei Schritte lösen erfahrungsgemäß die meisten Probleme:</p>
                    <ol class="steps-mini">
                        <li><span>1</span> App vollständig schließen und neu öffnen</li>
                        <li><span>2</span> Im Play Store prüfen, ob ein Update bereitsteht</li>
                        <li><span>3</span> Kurz die Internetverbindung wechseln (WLAN / mobil)</li>
                    </ol>

                    <div class="form-hintbox">
                        <?php icon('circle-help', 'icon-sm'); ?>
                        <p>Keine Störung, sondern eine Frage? Dann geht es über das
                           <a href="/kontakt">Kontaktformular</a> schneller.</p>
                    </div>

                    <div class="form-hintbox">
                        <?php icon('mail', 'icon-sm'); ?>
                        <p>Lieber direkt schreiben? <a href="mailto:<?= e(SITE_MAIL) ?>"><?= e(SITE_MAIL) ?></a></p>
                    </div>
                </div>

                <form class="form-card" id="support-form" data-form="support" novalidate>
                    <div class="form-group">
                        <label for="s-device">Gerät <span aria-hidden="true">*</span></label>
                        <input type="text" id="s-device" name="device" placeholder="z. B. Samsung Galaxy S23" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="s-os">Betriebssystem <span aria-hidden="true">*</span></label>
                            <select id="s-os" name="os" required>
                                <option value="" selected disabled>Bitte auswählen</option>
                                <option value="android">Android</option>
                                <option value="ios">iOS</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="s-version">App-Version <span aria-hidden="true">*</span></label>
                            <input type="text" id="s-version" name="appVersion" placeholder="steht in den Einstellungen" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="s-desc">Was passiert? <span aria-hidden="true">*</span></label>
                        <textarea id="s-desc" name="description" placeholder="Was hast du erwartet und was ist stattdessen passiert?" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="s-steps">Wie können wir es nachstellen?</label>
                        <textarea id="s-steps" name="steps" placeholder="1. Quiz öffnen&#10;2. Auf Weiter tippen&#10;3. …"></textarea>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="s-urgency">Wie dringend ist es?</label>
                            <select id="s-urgency" name="urgency">
                                <option value="niedrig">Stört kaum</option>
                                <option value="mittel" selected>Nervt regelmäßig</option>
                                <option value="hoch">Blockiert das Lernen</option>
                                <option value="kritisch">Gar nichts geht mehr</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="s-email">E-Mail für Rückfragen</label>
                            <input type="email" id="s-email" name="email" autocomplete="email">
                        </div>
                    </div>

                    <div class="hp-field" aria-hidden="true">
                        <label for="s-website">Website (bitte frei lassen)</label>
                        <input type="text" id="s-website" name="website" tabindex="-1" autocomplete="off">
                    </div>

                    <div class="form-group checkbox-group">
                        <label class="checkbox-label" for="s-privacy">
                            <input type="checkbox" id="s-privacy" name="privacy" required>
                            <span>Ich habe die <a href="/datenschutz" target="_blank" rel="noopener">Datenschutzerklärung</a>
                                  gelesen und stimme der Verarbeitung meiner Angaben zu.</span>
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block btn-lg">Fehler melden</button>
                    <div class="form-status" role="status" aria-live="polite"></div>
                </form>

            </div>
        </section>
    </main>

<?php
include __DIR__ . '/includes/footer.php';
include __DIR__ . '/includes/foot.php';
