<?php require_once __DIR__ . '/../site.php'; ?>
<section class="section security-detail">
    <div class="container">

        <div class="section-header">
            <span class="badge">Im Detail</span>
            <h2>Was hinter den fünf Schichten steckt</h2>
            <p>Kein Marketingbegriff, sondern fünf Stellen, an denen eine Antwort geprüft wird,
               bevor sie beim Kind ankommt.</p>
        </div>

        <div class="detail-list">
            <article class="detail-item reveal">
                <h3>1. System-Prompt</h3>
                <p>Der KI werden vor jedem Gespräch feste Regeln mitgegeben: Rolle, erlaubte Themen,
                   Tonfall und das Verbot, fertige Lösungen auszugeben. Diese Regeln stehen nicht im
                   Chat, sondern davor – ein Kind kann sie nicht überschreiben.</p>
            </article>

            <article class="detail-item reveal">
                <h3>2. Altersgerechte Anpassung</h3>
                <p>Klasse und Schulform aus dem Kindprofil bestimmen Wortwahl, Satzlänge und
                   Erklärtiefe. Ein Zweitklässler bekommt andere Sätze als ein Achtklässler, auch
                   wenn beide dieselbe Frage stellen.</p>
            </article>

            <article class="detail-item reveal">
                <h3>3. Themen-Filter</h3>
                <p>Anfragen außerhalb der Schulfächer werden abgewiesen, nicht umformuliert
                   beantwortet. Das Kind bekommt eine freundliche Rückmeldung und einen Vorschlag,
                   worüber stattdessen gesprochen werden kann.</p>
            </article>

            <article class="detail-item reveal">
                <h3>4. Manipulationsschutz</h3>
                <p>Versuche, die Regeln auszuhebeln – „tu so als ob", „vergiss deine Anweisungen" –
                   werden erkannt und laufen ins Leere. Die Regeln werden bei jeder Antwort neu
                   angewandt, nicht nur zu Beginn des Gesprächs.</p>
            </article>

            <article class="detail-item reveal">
                <h3>5. Eltern-Transparenz</h3>
                <p>Jede Nachricht bleibt im Verlauf einsehbar, auch Wochen später. Auffällige
                   Anfragen werden markiert, damit Sie sie nicht suchen müssen. Es gibt keinen
                   Modus, in dem ein Gespräch vor Ihnen verborgen bleibt.</p>
            </article>
        </div>

        <div class="detail-note">
            <?php icon('lock'); ?>
            <div>
                <h3>Und die Daten?</h3>
                <p>Lern- und Nutzungsdaten liegen in einem europäischen Rechenzentrum. Für die
                   Antworten des Tutors werden Gespräche an Google Vertex AI übertragen –
                   vertraglich ausgeschlossen ist, dass sie zum Training von KI-Modellen verwendet
                   werden. Details stehen in der <a href="/datenschutz">Datenschutzerklärung</a>.</p>
            </div>
        </div>

    </div>
</section>
