<?php
require_once __DIR__ . '/../site.php';

/**
 * Zahlenband direkt unter dem Hero. Die Zahlen zählen beim Erscheinen
 * hoch (.count-up in script.js) und stehen ohne JavaScript fertig da.
 *
 * Quellen: 8 Fächer (subject_config.dart), Klasse 1–8 (site.php),
 * 50 Level (xp_service.dart), 5 Schutzschichten (sicherheit.php),
 * Testzeitraum (site.php).
 */
$zahlen = [
    [8,               '',     'Fächer',          'von Mathe bis Geschichte'],
    [GRADE_MAX,       '',     'Klassenstufen',   'Klasse ' . GRADE_MIN . ' bis ' . GRADE_MAX],
    [50,              '',     'Level',           'Motivation, die mitwächst'],
    [5,               '',     'Schutzschichten', 'bevor eine Antwort ankommt'],
    [TRIAL_DAYS,      '',     'Tage gratis',     'danach monatlich kündbar'],
];
?>
<section class="zahlenband" aria-label="Lerndex in Zahlen">
    <div class="container">
        <ul class="zahlen reveal-stagger">
            <?php foreach ($zahlen as [$zahl, $suffix, $was, $klein]): ?>
                <li class="zahl">
                    <strong class="count-up" data-to="<?= (int) $zahl ?>" data-suffix="<?= e($suffix) ?>"><?= (int) $zahl . e($suffix) ?></strong>
                    <span class="zahl-was"><?= e($was) ?></span>
                    <span class="zahl-klein"><?= e($klein) ?></span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
