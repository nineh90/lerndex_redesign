<?php
require_once __DIR__ . '/../faq_data.php';

/**
 * $faq_teaser = true  → nur die wichtigsten Fragen, mit Link auf /faq
 *               false → alle Fragen in Gruppen (Unterseite)
 */
$faq_teaser = $faq_teaser ?? false;
$groups     = faq_groups();

if ($faq_teaser) {
    $teaserItems = [];
    foreach ($groups as $g) {
        foreach ($g['items'] as $item) {
            if (!empty($item['teaser'])) $teaserItems[] = $item;
        }
    }
}
?>
<section id="faq" class="section faq bg-light">
    <div class="container">

        <div class="section-header">
            <span class="badge">Fragen</span>
            <?php dual('Häufige Fragen', 'Was du vielleicht wissen willst', 'h2'); ?>
        </div>

        <?php if ($faq_teaser): ?>

            <div class="faq-list">
                <?php foreach ($teaserItems as $item): ?>
                    <div class="faq-item">
                        <div class="faq-question">
                            <span><?= e($item['q']) ?></span>
                            <?php icon('chevron-down'); ?>
                        </div>
                        <div class="faq-answer"><p><?= e($item['a']) ?></p></div>
                    </div>
                <?php endforeach; ?>
            </div>

            <p class="faq-more">
                <a href="/faq" class="btn btn-secondary">Alle Fragen ansehen</a>
            </p>

        <?php else: ?>

            <div class="faq-list">
                <?php foreach ($groups as $gi => $group): ?>
                    <div class="faq-section-header<?= $gi === 0 ? ' open' : '' ?>">
                        <span><?= $group['icon'] ?> <?= e($group['title']) ?></span>
                        <?php icon('chevron-down'); ?>
                    </div>
                    <div class="faq-section-body<?= $gi === 0 ? ' open' : '' ?>">
                        <?php foreach ($group['items'] as $item): ?>
                            <div class="faq-item">
                                <div class="faq-question">
                                    <span><?= e($item['q']) ?></span>
                                    <?php icon('chevron-down'); ?>
                                </div>
                                <div class="faq-answer"><p><?= e($item['a']) ?></p></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="faq-foot">
                <p>Frage nicht dabei?</p>
                <div class="faq-foot-cta">
                    <a href="/kontakt" class="btn btn-primary"><?php icon('mail'); ?> Schreib uns</a>
                    <a href="/support" class="btn btn-secondary">Problem mit der App melden</a>
                </div>
            </div>

        <?php endif; ?>

    </div>
</section>
