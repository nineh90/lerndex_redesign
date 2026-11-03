<?php
require_once __DIR__ . '/includes/site.php';

$page_title       = 'Support';
$page_h1          = 'Etwas funktioniert nicht?';
$page_lead        = 'Beschreiben Sie uns möglichst genau, was passiert ist – je mehr wir wissen, desto schneller ist es behoben.';
$page_title_full  = 'Support: Fehler in der Lerndex-App melden';
$page_description = 'Etwas funktioniert nicht? Melden Sie den Fehler mit Gerät, Betriebssystem und '
                  . 'App-Version – wir kümmern uns darum und melden uns zurück.';
$canonical        = SITE_URL . '/support';
$current_page     = 'support';

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
                        <p>Keine Störung, sondern eine Frage? Dann schauen Sie in die
                           <a href="/faq">häufigen Fragen</a> oder auf die <a href="/kontakt">Kontaktseite</a>.</p>
                    </div>
                </div>

                <?php
                $support_betreff = 'Fehlermeldung Lerndex-App';
                $support_text    = "Gerät (z. B. Samsung Galaxy S23):\n"
                                 . "Android-Version:\n"
                                 . "App-Version (steht in den Einstellungen der App):\n\n"
                                 . "Was ist passiert, und was hätten Sie erwartet?\n\n\n"
                                 . "Wie können wir es nachstellen?\n1.\n2.\n3.\n\n"
                                 . "Wie dringend ist es? (stört kaum / nervt regelmäßig / blockiert das Lernen / gar nichts geht mehr)\n";
                $support_mailto  = 'mailto:' . SITE_MAIL
                                 . '?subject=' . rawurlencode($support_betreff)
                                 . '&body=' . rawurlencode($support_text);
                ?>
                <div class="form-card">
                    <h2>Fehler per E-Mail melden</h2>
                    <p>Damit wir das Problem schnell nachstellen können, helfen uns diese Angaben:</p>
                    <ul class="check-list">
                        <li><?php icon('check', 'icon-sm'); ?> Gerät und Android-Version</li>
                        <li><?php icon('check', 'icon-sm'); ?> App-Version – steht in den Einstellungen der App</li>
                        <li><?php icon('check', 'icon-sm'); ?> Was passiert ist und was Sie erwartet hätten</li>
                        <li><?php icon('check', 'icon-sm'); ?> Wie wir es nachstellen können</li>
                        <li><?php icon('check', 'icon-sm'); ?> Gern ein Screenshot</li>
                    </ul>
                    <p>Der Knopf öffnet Ihr E-Mail-Programm mit einer fertigen Vorlage.</p>
                    <a class="btn btn-primary btn-block btn-lg" href="<?= e($support_mailto) ?>">
                        <?php icon('mail', 'icon-sm'); ?> Fehler melden
                    </a>
                    <p class="form-mail">
                        <?php icon('mail'); ?>
                        <a href="mailto:<?= e(SITE_MAIL) ?>"><?= e(SITE_MAIL) ?></a>
                    </p>
                </div>

            </div>
        </section>
    </main>

<?php
include __DIR__ . '/includes/footer.php';
include __DIR__ . '/includes/foot.php';
