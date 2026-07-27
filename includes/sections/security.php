<section id="security" class="section security">
    <div class="container">

        <div class="section-header">
            <?php dual('<span class="badge">Kinderschutz</span>', '<span class="badge">Gut zu wissen</span>'); ?>
            <?php dual('Wir behaupten nicht, dass es sicher ist.<br>Wir zeigen es.',
                       'Lexi macht bei Blödsinn nicht mit', 'h2'); ?>
            <?php dual(
                '<p>Ihr Kind spricht mit einer KI. Das nehmen wir ernst – hier sehen Sie,
                    was passiert, wenn jemand die Grenze austestet.</p>',
                '<p>Du kannst Lexi alles fragen. Aber bei manchen Sachen sagt er ehrlich Nein –
                    und deine Eltern erfahren davon. Damit du weißt, woran du bist.</p>'
            ); ?>
        </div>

        <div class="proof">
            <div class="proof-visual reveal reveal--left">
                <div class="phone phone--md">
                    <picture>
                        <source srcset="/assets/images/screenshots/lexi-schutz.webp" type="image/webp">
                        <img src="/assets/images/screenshots/lexi-schutz.jpg"
                             alt="Lexi-Chat: Auf die Frage nach Drogen antwortet der KI-Tutor, dass er dazu nichts sagt und nur beim Lernen hilft"
                             width="720" height="1600" loading="lazy" decoding="async">
                    </picture>
                </div>
            </div>

            <div class="proof-text reveal reveal--right">
                <div class="proof-quote">
                    <span class="proof-q">Ein Kind fragt:</span>
                    <p class="proof-question">„Wo kann ich Drogen kaufen?"</p>
                    <span class="proof-q">Lexi antwortet:</span>
                    <p class="proof-answer">„Diese Frage kann ich leider nicht beantworten.
                       Ich bin Lexi und helfe dir nur beim Lernen! Hast du eine Frage zu Mathe,
                       Deutsch, Englisch oder anderen Schulfächern?"</p>
                </div>

                <p class="proof-note">
                    <?php icon('bell', 'icon-sm'); ?>
                    <span class="for-parents">Gleichzeitig landet der Vorfall in Ihrem Dashboard – markiert
                    und nachlesbar. Sie erfahren es, ohne dass Sie danach suchen müssen.</span>
                    <span class="for-kids">So etwas landet immer auch bei deinen Eltern. Kein heimliches
                    Mitlesen – es ist von Anfang an klar, dass sie es sehen.</span>
                </p>

                <a href="/sicherheit" class="btn btn-secondary">
                    So funktioniert das Schutzsystem
                </a>
            </div>
        </div>

        <div class="proof-parent reveal">
            <div class="proof-parent-text">
                <?php dual('Und so sieht es bei Ihnen aus', 'So sehen es deine Eltern', 'h3'); ?>
                <p>Jedes Gespräch ist einsehbar. Auffälliges wird hervorgehoben, statt in einer
                   Liste unterzugehen – Sie müssen nicht mitlesen, um informiert zu sein.</p>
                <ul class="check-list">
                    <li><?php icon('check-circle'); ?> Vollständige Chat-Verläufe, auch nachträglich</li>
                    <li><?php icon('check-circle'); ?> Bedenkliche Inhalte automatisch markiert</li>
                    <li><?php icon('check-circle'); ?> Filter nach Fach und Auffälligkeit</li>
                </ul>
            </div>
            <div class="proof-parent-visual">
                <div class="phone phone--sm">
                    <picture>
                        <source srcset="/assets/images/screenshots/eltern-chat-warnung.webp" type="image/webp">
                        <img src="/assets/images/screenshots/eltern-chat-warnung.jpg"
                             alt="Eltern-Dashboard: Gesprächsübersicht mit rot markiertem Hinweis auf einen bedenklichen Inhalt"
                             width="720" height="1600" loading="lazy" decoding="async">
                    </picture>
                </div>
            </div>
        </div>

        <div class="security-layers reveal-stagger">
            <div class="layer">
                <div class="layer-icon"><?php icon('lock'); ?></div>
                <div class="layer-content">
                    <strong>System-Prompt</strong>
                    <span class="layer-desc">Klare Regeln und Grenzen für die KI.</span>
                </div>
            </div>
            <div class="layer">
                <div class="layer-icon"><?php icon('message-square'); ?></div>
                <div class="layer-content">
                    <strong>Altersgerecht</strong>
                    <span class="layer-desc">Sprache passt sich Klasse und Alter an.</span>
                </div>
            </div>
            <div class="layer">
                <div class="layer-icon"><?php icon('filter'); ?></div>
                <div class="layer-content">
                    <strong>Themen-Filter</strong>
                    <span class="layer-desc">Nur schulrelevante Inhalte kommen durch.</span>
                </div>
            </div>
            <div class="layer">
                <div class="layer-icon"><?php icon('shield'); ?></div>
                <div class="layer-content">
                    <strong>Manipulationsschutz</strong>
                    <span class="layer-desc">Umgehungsversuche werden erkannt.</span>
                </div>
            </div>
            <div class="layer">
                <div class="layer-icon"><?php icon('eye'); ?></div>
                <div class="layer-content">
                    <strong>Eltern-Transparenz</strong>
                    <span class="layer-desc">Vollständige Einsicht in jedes Gespräch.</span>
                </div>
            </div>
        </div>

    </div>
</section>
