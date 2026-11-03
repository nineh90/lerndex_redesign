<?php
require_once __DIR__ . '/../site.php';

/**
 * Abschluss der Kinderseite: Kinder kaufen nicht selbst – sie holen ihre
 * Eltern dazu. Der Teilen-Knopf nutzt auf dem Handy das Teilen-Menü des
 * Geräts (Web Share API); ohne das bleibt der mailto-Link, der auch ohne
 * JavaScript funktioniert.
 */
$eltern_link = SITE_URL . '/fuer-eltern';
$eltern_mail = 'mailto:?subject=' . rawurlencode('Schau mal: Lerndex')
    . '&body=' . rawurlencode("Kannst du dir das mal anschauen? Mit Lerndex kann ich mit Lexi lernen – "
        . "die ersten " . TRIAL_DAYS . " Tage kosten nichts.\n\n" . $eltern_link);
?>
<section class="section kids-cta" id="eltern" aria-labelledby="kids-cta-titel">
    <div class="container">
        <div class="kids-cta-box reveal">
            <div class="kids-sky kids-sky--leise" aria-hidden="true"></div>

            <img class="kids-cta-lexi" src="/assets/images/lexi/lexi-winkend-240.webp"
                 srcset="/assets/images/lexi/lexi-winkend-240.webp 240w, /assets/images/lexi/lexi-winkend-476.webp 476w"
                 sizes="220px" width="476" height="512" alt="" loading="lazy" decoding="async">

            <div class="kids-cta-text">
                <h2 id="kids-cta-titel">Lust bekommen?<br>Zeig's deinen Eltern!</h2>
                <p>Die ersten <?= TRIAL_DAYS ?> Tage kosten nichts. Danach entscheidet ihr zusammen,
                   ob Lexi bleibt.</p>
                <div class="kids-hero-actions">
                    <a href="<?= e($eltern_mail) ?>" class="btn-game btn-game--gelb"
                       data-teilen data-teilen-url="<?= e($eltern_link) ?>"
                       data-teilen-text="Kannst du dir das mal anschauen? Mit Lerndex kann ich mit Lexi lernen.">
                        <?php icon('send'); ?> An meine Eltern schicken
                    </a>
                    <a href="<?= e(PLAY_STORE_URL) ?>" class="btn-game btn-game--glas"
                       target="_blank" rel="noopener noreferrer">
                        <?php icon('smartphone'); ?> Im Play Store ansehen
                    </a>
                </div>
                <p class="kids-hero-note"><?php icon('check', 'icon-sm'); ?> Aktuell für Android<?php if (!IOS_AVAILABLE): ?> · iPhone in Vorbereitung<?php endif; ?></p>
            </div>
        </div>
    </div>
</section>
