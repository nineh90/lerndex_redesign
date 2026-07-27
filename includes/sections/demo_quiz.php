<?php require_once __DIR__ . '/../site.php'; ?>
<section class="section demoquiz" id="demo-quiz-section">
    <div class="container">

        <div class="section-header">
            <?php dual('<span class="badge">Selbst ausprobieren</span>',
                       '<span class="badge">Jetzt du</span>'); ?>
            <?php dual('Sehen Sie es sich an, bevor Sie etwas installieren',
                       'Trau dich – drei Fragen, mehr nicht', 'h2'); ?>
            <?php dual(
                '<p>Drei echte Fragen aus der App. Achten Sie auf das, was nach einer
                    falschen Antwort passiert – genau das ist der Unterschied.</p>',
                '<p>Such dir deine Klasse und ein Fach aus. Wenn du danebenliegst,
                    bekommst du eine Erklärung statt nur ein rotes Kreuz.</p>'
            ); ?>
        </div>

        <div class="quiz-card" id="demo-quiz" data-store="<?= e(PLAY_STORE_URL) ?>">

            <div data-quiz="setup">
                <div class="quiz-pick">
                    <span class="quiz-label" id="quiz-band-label">Welche Klasse?</span>
                    <div class="chip-row" data-quiz="bands" role="group" aria-labelledby="quiz-band-label"></div>
                </div>

                <div class="quiz-pick">
                    <span class="quiz-label" id="quiz-subject-label">Welches Fach?</span>
                    <div class="chip-row" data-quiz="subjects" role="group" aria-labelledby="quiz-subject-label"></div>
                </div>

                <button type="button" class="btn btn-primary btn-lg btn-block" data-quiz="start">
                    <?php icon('target'); ?> Quiz starten
                </button>

                <p class="quiz-hint">
                    Kein Konto, keine Anmeldung, nichts wird gespeichert.
                </p>
            </div>

            <div data-quiz="play" hidden></div>
            <div data-quiz="result" class="quiz-result" hidden></div>

            <noscript>
                <p class="quiz-hint">
                    Für das Demo-Quiz wird JavaScript benötigt. Alle Inhalte der Seite
                    sind auch ohne verfügbar.
                </p>
            </noscript>
        </div>

    </div>
</section>
