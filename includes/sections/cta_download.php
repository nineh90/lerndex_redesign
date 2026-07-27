<?php require_once __DIR__ . '/../site.php'; ?>
<section class="section cta-download">
    <div class="container">
        <div class="cta-box">
            <div class="cta-text">
                <?php dual('Bereit, es auszuprobieren?', 'Willst du loslegen?', 'h2'); ?>
                <?php dual(
                    '<p>' . TRIAL_DAYS . ' Tage kostenlos, keine Kündigungsfrist, keine Werbung.
                        Danach entscheiden Sie, ob es bleibt.</p>',
                    '<p>Frag deine Eltern – die ersten ' . TRIAL_DAYS . ' Tage kosten nichts.
                        Danach entscheidet ihr gemeinsam.</p>'
                ); ?>
            </div>
            <div class="cta-actions">
                <a href="<?= e(PLAY_STORE_URL) ?>" target="_blank" rel="noopener noreferrer"
                   class="btn btn-invert btn-lg"><?php icon('sparkles'); ?> Im Play Store holen</a>
                <a href="/kontakt" class="btn btn-ghost btn-lg cta-ghost">Erst eine Frage stellen</a>
            </div>
            <p class="cta-note">
                <?php icon('check', 'icon-sm'); ?> Aktuell für Android
                <?php if (!IOS_AVAILABLE): ?><span>· iOS in Vorbereitung</span><?php endif; ?>
            </p>
        </div>
    </div>
</section>
