<section id="contact" class="section contact">
    <div class="container">
        <div class="contact-grid">
            <div class="contact-text">
                <h2>Werde jetzt Testnutzer!</h2>
                <p>
                    Sichere dir einen der limitierten Beta-Plätze und werde Teil des Lerndex-Testprogramms. 
                    Du testest alle Funktionen bereits vor dem offiziellen App-Release komplett kostenlos 
                    und erhältst neue Versionen früher als alle anderen.
                    <br><br>
                    Dein Feedback hilft uns dabei, Lerndex zur besten Lernapp für Kinder zu entwickeln. 
                    Die Teilnahme ist jederzeit kündbar und kann problemlos beendet werden.
                </p>
                <div class="contact-info">
                    <div class="info-item">
                        <?php icon('mail'); ?>
                        <span><a href="mailto:info@lerndex.de">info@lerndex.de</a></span>
                    </div>
                </div>
            </div>
            <form id="beta-form" class="contact-form" novalidate>

                <div class="form-progress">
                    <div class="form-progress-top">
                        <span class="form-progress-label">Beta-Fragebogen</span>
                        <span class="form-progress-count" id="beta-progress-count">1/7</span>
                    </div>
                    <div class="form-progress-bar">
                        <div class="form-progress-fill" id="beta-progress-fill" style="width: 14%;"></div>
                    </div>
                </div>

                <div class="form-step is-active" data-step="1">
                    <div class="form-group">
                        <label for="beta-firstname">Vorname</label>
                        <input type="text" id="beta-firstname" name="firstname" placeholder="Dein Vorname" autocomplete="given-name" required>
                    </div>
                    <div class="form-actions">
                        <button type="button" class="btn btn-primary btn-block" data-next>Weiter</button>
                    </div>
                </div>

                <div class="form-step" data-step="2">
                    <div class="form-group">
                        <label for="beta-lastname">Nachname</label>
                        <input type="text" id="beta-lastname" name="lastname" placeholder="Dein Nachname" autocomplete="family-name" required>
                    </div>
                    <div class="form-actions split">
                        <button type="button" class="btn btn-ghost" data-back>Zurück</button>
                        <button type="button" class="btn btn-primary" data-next>Weiter</button>
                    </div>
                </div>

                <div class="form-step" data-step="3">
                    <div class="form-group">
                        <label for="beta-email">E-Mail</label>
                        <input type="email" id="beta-email" name="email" placeholder="Deine E-Mail" autocomplete="email" required>
                    </div>
                    <div class="form-actions split">
                        <button type="button" class="btn btn-ghost" data-back>Zurück</button>
                        <button type="button" class="btn btn-primary" data-next>Weiter</button>
                    </div>
                </div>

                <div class="form-step" data-step="4">
                    <div class="form-group">
                        <label for="beta-childrenCount">Wie viele Kinder sollen Lerndex nutzen?</label>
                        <select id="beta-childrenCount" name="childrenCount" required>
                            <option value="" selected disabled>Bitte auswählen</option>
                            <option value="1">1 Kind</option>
                            <option value="2">2 Kinder</option>
                            <option value="3">3 Kinder</option>
                            <option value="4+">4 oder mehr</option>
                        </select>
                    </div>
                    <div class="form-actions split">
                        <button type="button" class="btn btn-ghost" data-back>Zurück</button>
                        <button type="button" class="btn btn-primary" data-next>Weiter</button>
                    </div>
                </div>

                <div class="form-step" data-step="5">
                    <div class="form-group">
                        <label for="beta-ageRange">Altersbereich der Kinder</label>
                        <select id="beta-ageRange" name="ageRange" required>
                            <option value="" selected disabled>Bitte auswählen</option>
                            <option value="6-7">6–7 Jahre (Klasse 1–2)</option>
                            <option value="8-10">8–10 Jahre (Klasse 3–4)</option>
                            <option value="11-12">11–12 Jahre (Klasse 5–6)</option>
                            <option value="13-14">13–14 Jahre (Klasse 7–8)</option>
                            <option value="mix">Gemischt</option>
                        </select>
                    </div>
                    <div class="form-actions split">
                        <button type="button" class="btn btn-ghost" data-back>Zurück</button>
                        <button type="button" class="btn btn-primary" data-next>Weiter</button>
                    </div>
                </div>

                <div class="form-step" data-step="6">
                    <div class="form-group">
                        <label for="beta-schoolType">Schulform</label>
                        <select id="beta-schoolType" name="schoolType" required>
                            <option value="" selected disabled>Bitte auswählen</option>
                            <option value="grundschule">Grundschule</option>
                            <option value="hauptschule">Hauptschule</option>
                            <option value="realschule">Realschule</option>
                            <option value="gesamtschule">Gesamtschule</option>
                            <option value="gymnasium">Gymnasium</option>
                        </select>
                    </div>
                    <div class="form-actions split">
                        <button type="button" class="btn btn-ghost" data-back>Zurück</button>
                        <button type="button" class="btn btn-primary" data-next>Weiter</button>
                    </div>
                </div>

                <div class="form-step" data-step="7">
                    <div class="form-group">
                        <label for="beta-source">Wie hast du von Lerndex erfahren?</label>
                        <select id="beta-source" name="source" required>
                            <option value="" selected disabled>Bitte auswählen</option>
                            <option value="tiktok">TikTok</option>
                            <option value="instagram">Instagram</option>
                            <option value="whatsapp">WhatsApp / Status</option>
                            <option value="google">Google / Suche</option>
                            <option value="empfehlung">Empfehlung</option>
                            <option value="nils-digital">nils-digital.de</option>
                            <option value="sonstiges">Sonstiges</option>
                        </select>
                    </div>
                    <div class="form-group checkbox-group">
                        <label class="checkbox-label" for="beta-privacy">
                            <input type="checkbox" id="beta-privacy" name="privacy" required>
                            <span>Ich habe die <a href="/datenschutz" target="_blank" rel="noopener">Datenschutzerklärung</a> gelesen und stimme zu.</span>
                        </label>
                    </div>
                    <div class="form-actions split">
                        <button type="button" class="btn btn-ghost" data-back>Zurück</button>
                        <button type="submit" class="btn btn-primary">Beta-Platz sichern</button>
                    </div>
                </div>

                <div id="form-status" class="form-status" aria-live="polite"></div>
            </form>
        </div>
    </div>
</section>