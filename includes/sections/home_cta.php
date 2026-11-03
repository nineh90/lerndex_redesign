<?php require_once __DIR__ . '/../site.php'; ?>
<section class="section home-cta" aria-labelledby="home-cta-titel">
    <div class="container">
        <div class="home-cta-box reveal">
            <div class="home-cta-text">
                <h2 id="home-cta-titel">Bereit, Lexi kennenzulernen?</h2>
                <p>Probieren Sie Lerndex <?= TRIAL_DAYS ?> Tage kostenlos aus. Ohne Werbung, ohne
                   Kündigungsfrist – und mit einem Lernbegleiter, der nie die Geduld verliert.</p>
                <div class="home-cta-knoepfe">
                    <a href="<?= e(PLAY_STORE_URL) ?>" target="_blank" rel="noopener noreferrer"
                       class="btn btn-invert btn-lg"><?php icon('smartphone'); ?> Jetzt gratis testen</a>
                    <a href="/faq" class="btn btn-ghost btn-lg cta-ghost">Erst Fragen klären</a>
                </div>
                <p class="home-cta-notiz">
                    <?php icon('check', 'icon-sm'); ?> Aktuell für Android
                    <?php if (!IOS_AVAILABLE): ?>· iPhone in Vorbereitung<?php endif; ?>
                </p>
            </div>
            <img class="home-cta-lexi" src="/assets/images/lexi/lexi-winkend-476.webp"
                 srcset="/assets/images/lexi/lexi-winkend-240.webp 240w, /assets/images/lexi/lexi-winkend-476.webp 476w"
                 sizes="(min-width: 860px) 260px, 180px" width="476" height="512"
                 alt="" loading="lazy" decoding="async">
        </div>
    </div>
</section>
