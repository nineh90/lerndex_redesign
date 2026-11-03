<?php
require_once __DIR__ . '/../site.php';

/**
 * XP-Spiel zum Ausprobieren.
 *
 * Rechnet mit denselben Regeln wie die App (lerndex_app, xp_service.dart und
 * quiz_engine.dart, geprüft 04.11.2026):
 *   - richtige Antwort 5 XP, beim zweiten Versuch 2 XP
 *   - XP fuer ein Level: 50 + 10·L + 1,5·L², auf Zehner gerundet
 *   - 50 Level in fuenf Raengen
 * Wer daran etwas aendert, muss es in kids.js (gleiche Formel) mitziehen.
 *
 * Ohne JavaScript bleibt eine ruhige Anzeige mit Level 1 stehen; die Knoepfe
 * blendet kids.js erst ein, wenn es laeuft (hidden-Attribut).
 */
$raenge = [
    ['📚', 'Lernling',  '1–10'],
    ['🔍', 'Entdecker', '11–20'],
    ['🔬', 'Forscher',  '21–30'],
    ['🎓', 'Experte',   '31–40'],
    ['🏆', 'Meister',   '41–50'],
];
?>
<section class="section kids-level" id="level" aria-labelledby="level-titel">
    <div class="kids-sky kids-sky--leise" aria-hidden="true"></div>
    <div class="container">
        <div class="section-header section-header--hell">
            <span class="badge badge-game">Probier's aus</span>
            <h2 id="level-titel">Sammle XP. Steig auf.</h2>
            <p>Jede richtige Antwort bringt dir 5 XP. Genug XP – und du steigst ein Level auf.
               50 Level gibt es, in fünf Rängen. Drück mal auf die Knöpfe!</p>
        </div>

        <div class="xp-spiel" data-xp-spiel>
            <div class="xp-kopf">
                <div class="xp-level" aria-hidden="true">
                    <span class="xp-level-zahl" data-xp-level>1</span>
                    <span class="xp-level-wort">Level</span>
                </div>
                <div class="xp-info">
                    <p class="xp-rang"><span data-xp-rang-emoji>📚</span> <span data-xp-rang>Lernling</span></p>
                    <div class="xp-balken" role="progressbar" aria-label="XP bis zum nächsten Level"
                         aria-valuemin="0" aria-valuemax="60" aria-valuenow="40" data-xp-balken>
                        <span class="xp-fuellung" style="width: 66%" data-xp-fuellung></span>
                    </div>
                    <p class="xp-zahlen"><span data-xp-ist>40</span> / <span data-xp-ziel>60</span> XP</p>
                </div>
            </div>

            <div class="xp-knoepfe" data-xp-knoepfe hidden>
                <button type="button" class="xp-knopf" data-xp-plus="5">
                    <span class="xp-knopf-emoji" aria-hidden="true">✅</span>
                    <span>Richtige Antwort</span>
                    <strong>+5 XP</strong>
                </button>
                <button type="button" class="xp-knopf" data-xp-plus="2">
                    <span class="xp-knopf-emoji" aria-hidden="true">🔁</span>
                    <span>Im 2. Versuch richtig</span>
                    <strong>+2 XP</strong>
                </button>
                <button type="button" class="xp-knopf xp-knopf--gross" data-xp-plus="50">
                    <span class="xp-knopf-emoji" aria-hidden="true">🚀</span>
                    <span>10 richtige Antworten</span>
                    <strong>+50 XP</strong>
                </button>
            </div>

            <p class="xp-meldung" data-xp-meldung role="status" aria-live="polite"></p>
            <p class="xp-hinweis">Spiel-Demo mit den echten Regeln der App. Hier wird nichts gespeichert.</p>
        </div>

        <ol class="rang-leiter reveal-stagger" aria-label="Die fünf Ränge">
            <?php foreach ($raenge as $i => [$emoji, $name, $level]): ?>
                <li class="rang" data-rang-index="<?= $i ?>">
                    <span class="rang-emoji" aria-hidden="true"><?= $emoji ?></span>
                    <span class="rang-name"><?= e($name) ?></span>
                    <span class="rang-level">Level <?= e($level) ?></span>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>
</section>
