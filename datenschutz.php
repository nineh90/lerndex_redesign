<?php
require_once __DIR__ . '/includes/site.php';

$page_title   = 'Datenschutzerklärung';
$page_noindex = true;
$current_page = 'datenschutz';

include __DIR__ . '/includes/head.php';
include __DIR__ . '/includes/navbar.php';
?>

    <main id="main" class="legal-page">
        <div class="container">
            <a href="/" class="back-link">
                <?php icon('arrow-left'); ?> Zurück zur Startseite
            </a>
            <div class="legal-content">
                <h1>Datenschutzerklärung</h1>
                <p class="subtitle">Stand: Juli 2026 &nbsp;·&nbsp; Lerndex ist eine App für Kinder und Jugendliche. Wir nehmen den Schutz ihrer Daten besonders ernst.</p>

                <div class="children-box">
                    <div class="box-title">
                        <?php icon('shield-check'); ?>
                        Wichtiger Hinweis für Eltern
                    </div>
                    <p>Lerndex richtet sich an Kinder und Jugendliche unter 18 Jahren. Für die Nutzung durch Kinder unter 16 Jahren ist die <strong>ausdrückliche Einwilligung eines Erziehungsberechtigten</strong> erforderlich (Art. 8 DSGVO). Eltern haben vollständigen Einblick in alle Aktivitäten und KI-Gespräche ihres Kindes und können jederzeit die Löschung aller Daten verlangen.</p>
                </div>

                <nav class="toc">
                    <h3>Inhaltsverzeichnis</h3>
                    <ol>
                        <li><a href="#verantwortlicher">Verantwortlicher</a></li>
                        <li><a href="#grundsaetze">Unsere Grundsätze beim Kinderschutz</a></li>
                        <li><a href="#welche-daten">Welche Daten wir erheben</a></li>
                        <li><a href="#zweck">Zweck der Datenverarbeitung</a></li>
                        <li><a href="#firebase">Firebase & Google-Dienste</a></li>
                        <li><a href="#ki-tutor">KI-Tutor & Gemini</a></li>
                        <li><a href="#hosting">Hosting der Website</a></li>
                        <li><a href="#analytics">Google Analytics (Website)</a></li>
                        <li><a href="#formulare">Kontakt- und Supportformular</a></li>
                        <li><a href="#eltern">Eltern-Dashboard & Aufsicht</a></li>
                        <li><a href="#abonnement">Abonnement & Zahlung</a></li>
                        <li><a href="#speicherung">Speicherung & Löschung</a></li>
                        <li><a href="#rechte">Ihre Rechte</a></li>
                        <li><a href="#kontakt">Kontakt & Beschwerden</a></li>
                    </ol>
                </nav>

                <!-- 1 -->
                <h2 id="verantwortlicher">1. Verantwortlicher</h2>
                <p>
                    Nils Nehring<br>
                    Nils-Digital<br>
                    Permer Stollen 6<br>
                    49479 Ibbenbüren<br>
                    E-Mail: <a href="mailto:datenschutz@lerndex.de">datenschutz@lerndex.de</a><br>
                    Telefon: [Telefonnummer]
                </p>
                <p>Bei allen datenschutzbezogenen Fragen können Sie uns jederzeit unter der oben genannten E-Mail-Adresse erreichen.</p>

                <!-- 2 -->
                <h2 id="grundsaetze">2. Unsere Grundsätze beim Kinderschutz</h2>
                <p>Lerndex wurde von Grund auf mit dem Ziel entwickelt, Kindern eine <strong>sichere Lernumgebung</strong> zu bieten. Folgende Grundsätze leiten uns:</p>
                <ul>
                    <li><strong>Datensparsamkeit:</strong> Wir erheben nur die Daten, die für den Betrieb der App zwingend erforderlich sind.</li>
                    <li><strong>Keine Werbung:</strong> Wir verkaufen keine personenbezogenen Daten an Dritte und schalten keine Werbung innerhalb der App.</li>
                    <li><strong>Elterliche Kontrolle:</strong> Eltern haben vollständige Transparenz und Kontrollmöglichkeit über alle Aktivitäten ihrer Kinder.</li>
                    <li><strong>KI-Sicherheit:</strong> Unser KI-Tutor ist durch ein mehrschichtiges Filtersystem geschützt und kann keine unangemessenen Inhalte liefern.</li>
                    <li><strong>Keine Profilerstellung für Werbezwecke:</strong> Nutzungsdaten werden ausschließlich zur Verbesserung des Lernerlebnisses verwendet.</li>
                </ul>

                <!-- 3 -->
                <h2 id="welche-daten">3. Welche Daten wir erheben</h2>

                <h3>3.1 Accountdaten</h3>
                <ul>
                    <li>E-Mail-Adresse des Elternteils / Erziehungsberechtigten</li>
                    <li>Vorname des Kindes (kein Nachname erforderlich)</li>
                    <li>Klasse / Schulstufe des Kindes</li>
                    <li>Passwort (verschlüsselt gespeichert, nie im Klartext)</li>
                    <li>Optional: Profilbild (Avatar-Auswahl innerhalb der App)</li>
                </ul>

                <h3>3.2 Lern- & Nutzungsdaten</h3>
                <ul>
                    <li>Absolvierte Quizze und erzielte Punkte (XP)</li>
                    <li>Lernzeit (nur aktive Nutzungszeit während Quizzen und KI-Gesprächen)</li>
                    <li>Erreichte Level und Abzeichen</li>
                    <li>Lernstreaks (tägliche Nutzungskontinuität)</li>
                    <li>Fehler und Stärken je Fach (zur personalisierten Aufgabengenerierung)</li>
                </ul>

                <h3>3.3 KI-Tutor-Gespräche</h3>
                <ul>
                    <li>Inhalte aller Nachrichten im KI-Tutor-Chat</li>
                    <li>Datum und Uhrzeit der Gespräche</li>
                    <li>Diese Daten sind dauerhaft für Eltern einsehbar, auch wenn das Kind seine Gesprächshistorie löscht</li>
                </ul>

                <h3>3.4 Technische Daten</h3>
                <ul>
                    <li>Gerätetyp (iOS / Android) und Betriebssystemversion</li>
                    <li>App-Version</li>
                    <li>Anonymisierte Fehlerprotokolle (Crash-Reports)</li>
                </ul>

                <div class="info-box">
                    <p><strong>Nicht erhoben:</strong> Wir erheben keine Standortdaten, keine biometrischen Daten, keine Social-Media-Verknüpfungen und keine Daten über das Surfverhalten außerhalb der App.</p>
                </div>

                <!-- 4 -->
                <h2 id="zweck">4. Zweck der Datenverarbeitung</h2>
                <p>Wir verarbeiten personenbezogene Daten ausschließlich zu folgenden Zwecken:</p>
                <ul>
                    <li><strong>Bereitstellung der App-Funktionen</strong> (Quizze, KI-Tutor, Fortschrittstracking) – Rechtsgrundlage: Art. 6 Abs. 1 lit. b DSGVO (Vertragserfüllung)</li>
                    <li><strong>Elternkontrolle & Transparenz</strong> (Einsicht in alle Aktivitäten) – Rechtsgrundlage: Art. 6 Abs. 1 lit. b DSGVO</li>
                    <li><strong>Personalisiertes Lernerlebnis</strong> (Aufgaben auf Basis des Lernstands) – Rechtsgrundlage: Art. 6 Abs. 1 lit. b DSGVO</li>
                    <li><strong>Sicherheit und Missbrauchsprävention</strong> – Rechtsgrundlage: Art. 6 Abs. 1 lit. f DSGVO (berechtigtes Interesse)</li>
                    <li><strong>Abonnementverwaltung und Rechnungsstellung</strong> – Rechtsgrundlage: Art. 6 Abs. 1 lit. b DSGVO</li>
                    <li><strong>Verbesserung der App</strong> (anonymisierte Nutzungsstatistiken) – Rechtsgrundlage: Art. 6 Abs. 1 lit. f DSGVO</li>
                </ul>

                <!-- 5 -->
                <h2 id="firebase">5. Firebase & Google-Dienste</h2>
                <p>Lerndex nutzt <strong>Google Firebase</strong> als Backend-Plattform. Folgende Firebase-Dienste kommen zum Einsatz:</p>

                <h3>5.1 Firebase Authentication</h3>
                <p>Für die Anmeldung werden E-Mail-Adresse und Passwort (verschlüsselt) bei Google Firebase gespeichert. Alternativ ist eine Anmeldung über <strong>Google Sign-In</strong> möglich, wobei nur die E-Mail-Adresse und der öffentliche Google-Name übertragen werden.</p>

                <h3>5.2 Firebase Firestore</h3>
                <p>Alle Lern- und Nutzungsdaten (Punkte, Lernzeit, Quiz-Ergebnisse, KI-Gespräche) werden in der Cloud-Datenbank Firestore gespeichert. Datenspeicherort: <strong>Europa (Frankfurt, Region europe-west3)</strong>.</p>

                <h3>5.3 Firebase Vertex AI / Gemini</h3>
                <p>Der KI-Tutor basiert auf Google Gemini 2.0 Flash, das über Firebase Vertex AI bereitgestellt wird. Gespräche werden zur Beantwortung an Google-Server übertragen. Google verarbeitet diese Daten gemäß seiner <a href="https://policies.google.com/privacy" target="_blank">Datenschutzrichtlinie</a>. Gemäß unserer Vereinbarung mit Google werden diese Daten nicht für das Training von KI-Modellen verwendet.</p>

                <div class="children-box">
                    <div class="box-title">
                        <?php icon('bot'); ?>
                        KI-Schutz für Kinder
                    </div>
                    <p>Jede Anfrage an den KI-Tutor wird durch unser <strong>fünfschichtiges Sicherheitssystem</strong> gefiltert: strukturierte Systemanweisungen, altersgerechte Kommunikation, Themenbeschränkung auf Schulfächer, Manipulationsresistenz und vollständige Elterntransparenz. Unangemessene Anfragen werden sofort blockiert und Eltern werden benachrichtigt.</p>
                </div>

                <p>Rechtsgrundlage für die Nutzung von Firebase: Art. 6 Abs. 1 lit. b DSGVO (Vertragserfüllung). Mit Google wurde ein <strong>Auftragsverarbeitungsvertrag</strong> (Data Processing Agreement) abgeschlossen.</p>

                <!-- 6 -->
                <h2 id="ki-tutor">6. KI-Tutor & Gemini im Detail</h2>
                <p>Der KI-Tutor ist das Herzstück von Lerndex. Folgendes gilt für die Datenverarbeitung:</p>
                <ul>
                    <li>Gespräche werden <strong>doppelt gespeichert</strong>: einmal in der Kind-sichtbaren Chronik und einmal in einem dauerhaften, nur für Eltern zugänglichen Archiv.</li>
                    <li>Löscht ein Kind seine Gesprächshistorie, bleibt das Eltern-Archiv vollständig erhalten.</li>
                    <li>Gespräche werden <strong>nicht</strong> für das Training von KI-Modellen durch Google verwendet (gemäß unserem Vertrag).</li>
                    <li>Gesprächsdaten werden nach <strong>12 Monaten</strong> automatisch gelöscht, sofern Eltern nicht ausdrücklich eine längere Aufbewahrung wünschen.</li>
                    <li>Eltern können jederzeit einzelne oder alle Gespräche über das Eltern-Dashboard löschen.</li>
                </ul>

                <!-- 6a -->
                <h2 id="hosting">6a. Hosting der Website (lerndex.de)</h2>
                <p>Die Website lerndex.de wird bei einem externen Anbieter gehostet. Bei jedem Aufruf einer Seite werden vom Webserver automatisch Zugriffsdaten in einer Protokolldatei (Server-Logfile) erfasst. Das ist technisch notwendig, um die Seite ausliefern zu können, und geschieht unabhängig von Ihrer Cookie-Entscheidung.</p>
                <ul>
                    <li>IP-Adresse des anfragenden Geräts</li>
                    <li>Datum und Uhrzeit des Zugriffs</li>
                    <li>Name und URL der abgerufenen Datei</li>
                    <li>Übertragene Datenmenge und Meldung über den Erfolg des Abrufs</li>
                    <li>Browserkennung (User-Agent) und Betriebssystem</li>
                    <li>Zuvor besuchte Seite (Referrer), sofern übermittelt</li>
                </ul>
                <p><strong>Zweck und Rechtsgrundlage:</strong> Die Verarbeitung dient dem technischen Betrieb, der Stabilität und der Sicherheit der Website (Abwehr von Angriffen, Fehleranalyse). Rechtsgrundlage ist Art. 6 Abs. 1 lit. f DSGVO; unser berechtigtes Interesse liegt in einem störungsfreien und sicheren Betrieb der Website.</p>
                <p><strong>Speicherdauer:</strong> Die Logfiles werden vom Hoster nach spätestens sieben Tagen gelöscht oder gekürzt. Eine Zusammenführung dieser Daten mit anderen Datenquellen findet nicht statt.</p>
                <p>Mit dem Hosting-Anbieter besteht ein Auftragsverarbeitungsvertrag gemäß Art. 28 DSGVO. Der Server steht in Deutschland.</p>

                <div class="info-box">
                    <p><span class="placeholder">Zu ergänzen</span> Name und Anschrift des Hosting-Anbieters sowie die tatsächliche Speicherdauer der Logfiles laut Vertrag.</p>
                </div>

                <p><strong>Keine externen Ressourcen:</strong> Schriften, Bilder, Symbole und Skripte der Website werden ausschließlich von unserem eigenen Server geladen. Es findet insbesondere keine Einbindung von Google Fonts, keine Einbindung eines Content-Delivery-Networks und kein Nachladen externer Bibliotheken statt. Ohne Ihre Einwilligung baut Ihr Browser daher keine Verbindung zu Dritt-Servern auf.</p>

                <!-- 7 -->
                <h2 id="analytics">7. Google Analytics (Website lerndex.de)</h2>
                <p>Die <strong>Website lerndex.de</strong> (nicht die App) verwendet Google Analytics 4 zur Analyse des Nutzerverhaltens auf der Webseite. Folgendes gilt:</p>
                <ul>
                    <li>Google Analytics wird <strong>erst nach Ihrer ausdrücklichen Einwilligung</strong> über das Cookie-Banner geladen. Lehnen Sie ab oder treffen Sie keine Entscheidung, wird das Google-Skript nicht nachgeladen und es geht keine Anfrage an Google.</li>
                    <li>Rechtsgrundlage für das Speichern und Auslesen der Cookies ist § 25 Abs. 1 TDDDG, für die anschließende Verarbeitung Art. 6 Abs. 1 lit. a DSGVO.</li>
                    <li>Google Analytics 4 speichert die IP-Adresse nicht dauerhaft; sie wird zur Grobverortung genutzt und dabei gekürzt. Werbebezogene Signale (<code>ad_storage</code>, <code>ad_user_data</code>, <code>ad_personalization</code>) sind dauerhaft deaktiviert, eine Zusammenführung mit Werbenetzwerken findet nicht statt.</li>
                    <li>Es werden keine personenbezogenen Daten von App-Nutzern (Kindern) an Google Analytics übertragen.</li>
                    <li>Ihre Einwilligung können Sie jederzeit widerrufen, indem Sie die Website-Daten für lerndex.de in Ihrem Browser löschen. Der Banner erscheint dann erneut.</li>
                </ul>
                <p>Eine Übermittlung in die USA ist nicht ausgeschlossen. Google ist unter dem EU-US Data Privacy Framework zertifiziert; zusätzlich bestehen Standarddatenschutzklauseln.</p>
                <p>Google Analytics ist ein Dienst der Google Ireland Limited, Gordon House, Barrow Street, Dublin 4, Irland. Weitere Informationen: <a href="https://policies.google.com/privacy" target="_blank" rel="noopener">Google Datenschutzrichtlinie</a>.</p>

                <!-- 7a -->
                <h2 id="formulare">7a. Kontakt- und Supportformular</h2>
                <p>Auf den Seiten <a href="/kontakt">Kontakt</a> und <a href="/support">Support</a> können Sie uns über ein Formular erreichen. Dabei werden ausschließlich die von Ihnen eingegebenen Angaben verarbeitet.</p>
                <ul>
                    <li><strong>Kontaktformular:</strong> Name, E-Mail-Adresse, gewähltes Thema und Ihre Nachricht.</li>
                    <li><strong>Supportformular:</strong> Gerät, Betriebssystem, App-Version, Fehlerbeschreibung, Reproduktionsschritte, Dringlichkeit sowie – freiwillig – Name und E-Mail-Adresse für Rückfragen.</li>
                    <li><strong>Technisch mitgesendet:</strong> Zeitpunkt des Absendens, Browserkennung (User-Agent) und die zuvor besuchte Seite. Diese Angaben dienen der Missbrauchserkennung.</li>
                </ul>

                <div class="info-box">
                    <p><strong>Bitte keine Kinderdaten:</strong> Geben Sie in den Formularen keine personenbezogenen Daten Ihres Kindes an. Für Anliegen, die ein konkretes Kindprofil betreffen, nutzen Sie bitte den Elternbereich in der App.</p>
                </div>

                <h3>Verarbeitung über n8n</h3>
                <p>Die Formularinhalte werden von unserem Webserver an eine Automatisierungsplattform (<strong>n8n</strong>) übermittelt, über die wir Anfragen entgegennehmen und bearbeiten. Die Webhook-Adresse ist serverseitig hinterlegt und im Quelltext der Seite nicht sichtbar. Mit dem Betreiber der Instanz besteht ein Auftragsverarbeitungsvertrag.</p>

                <div class="info-box">
                    <p><span class="placeholder">Zu ergänzen</span> Betreiber und Serverstandort der n8n-Instanz sowie Speicherdauer der eingegangenen Anfragen.</p>
                </div>

                <p><strong>Rechtsgrundlage:</strong> Art. 6 Abs. 1 lit. a DSGVO (Ihre Einwilligung über die Checkbox) sowie Art. 6 Abs. 1 lit. b und f DSGVO (Bearbeitung Ihrer Anfrage und berechtigtes Interesse an funktionierendem Support).</p>
                <p><strong>Speicherdauer:</strong> Wir bewahren Anfragen so lange auf, wie es zur Bearbeitung erforderlich ist, und löschen sie anschließend, sofern keine gesetzlichen Aufbewahrungsfristen entgegenstehen.</p>
                <p><strong>Spamschutz:</strong> Die Formulare enthalten ein für Sie unsichtbares Zusatzfeld (Honeypot) und eine Begrenzung der Absendungen pro IP-Adresse und Stunde. Es werden dabei keine Cookies gesetzt und keine externen Dienste eingebunden.</p>

                <!-- 8 -->
                <h2 id="eltern">8. Eltern-Dashboard & Aufsicht</h2>
                <p>Das Eltern-Dashboard bietet vollständige Transparenz und Kontrolle:</p>
                <ul>
                    <li><strong>Echtzeit-Übersicht</strong> über Lernzeit, XP, Streaks und absolvierte Quizze</li>
                    <li><strong>Vollständiger Einblick</strong> in alle KI-Gespräche des Kindes</li>
                    <li><strong>Benachrichtigung</strong> bei geflaggten oder unangemessenen Inhalten</li>
                    <li><strong>PIN-Schutz</strong>: Der Elternbereich ist durch eine separate PIN gesichert, die Kinder nicht umgehen können</li>
                    <li><strong>Datenlöschung</strong>: Eltern können jederzeit einzelne Daten oder das gesamte Kind-Profil löschen</li>
                    <li><strong>Kontoverwaltung</strong>: Eltern können Kind-Profile hinzufügen, bearbeiten und entfernen</li>
                </ul>

                <!-- 9 -->
                <h2 id="abonnement">9. Abonnement & Zahlung</h2>
                <p>Lerndex wird als Abonnement-Dienst angeboten. Zahlungen werden über die offiziellen Plattform-Stores abgewickelt:</p>
                <ul>
                    <li><strong>iOS (Apple):</strong> Zahlungsabwicklung durch Apple Inc. über In-App Purchase</li>
                    <li><strong>Android (Google):</strong> Zahlungsabwicklung durch Google LLC über Google Play Billing</li>
                </ul>
                <p>Wir erhalten von Apple bzw. Google ausschließlich eine Bestätigung des Abonnementstatus sowie einen anonymisierten Nutzeridentifier. Vollständige Zahlungsdaten (Kreditkarte, Bankdaten etc.) werden <strong>ausschließlich</strong> von Apple/Google verarbeitet und gelangen nicht in unsere Systeme.</p>
                <p>Zur technischen Verwaltung des Abonnementstatus nutzen wir <strong>RevenueCat</strong> (RevenueCat, Inc., USA). RevenueCat verarbeitet ausschließlich anonymisierte Abonnementdaten und ist vertraglich zur Einhaltung der DSGVO verpflichtet.</p>

                <!-- 10 -->
                <h2 id="speicherung">10. Speicherung & Löschung</h2>

                <h3>10.1 Speicherdauer</h3>
                <ul>
                    <li><strong>Account- und Lernfortschrittsdaten:</strong> Für die Dauer des aktiven Abonnements plus 30 Tage nach Kündigung</li>
                    <li><strong>KI-Gespräche:</strong> 12 Monate ab Erstellungsdatum, dann automatische Löschung</li>
                    <li><strong>Abrechnungsdaten:</strong> 10 Jahre gemäß gesetzlicher Aufbewahrungspflicht (§ 147 AO)</li>
                    <li><strong>Fehlerprotokolle:</strong> 30 Tage, dann automatische Löschung</li>
                </ul>

                <h3>10.2 Löschanfragen</h3>
                <p>Eltern können die vollständige Löschung aller Daten ihres Kindes jederzeit verlangen:</p>
                <ul>
                    <li>Direkt im App über das Eltern-Dashboard (Kind-Profil löschen)</li>
                    <li>Per E-Mail an <a href="mailto:datenschutz@lerndex.de">datenschutz@lerndex.de</a></li>
                </ul>
                <p>Die Löschung erfolgt innerhalb von <strong>7 Werktagen</strong>. Ausgenommen sind gesetzlich vorgeschriebene Aufbewahrungsfristen (z. B. Abrechnungsdaten).</p>

                <!-- 11 -->
                <h2 id="rechte">11. Ihre Rechte (und die Ihrer Kinder)</h2>
                <p>Als Erziehungsberechtigte haben Sie – auch stellvertretend für Ihr Kind – folgende Rechte gemäß DSGVO:</p>
                <ul>
                    <li><strong>Auskunftsrecht</strong> (Art. 15 DSGVO): Welche Daten wir über Ihr Kind gespeichert haben</li>
                    <li><strong>Berichtigungsrecht</strong> (Art. 16 DSGVO): Korrektur falscher oder unvollständiger Daten</li>
                    <li><strong>Löschungsrecht</strong> (Art. 17 DSGVO): Vollständige Löschung aller Daten</li>
                    <li><strong>Einschränkungsrecht</strong> (Art. 18 DSGVO): Einschränkung der Datenverarbeitung</li>
                    <li><strong>Widerspruchsrecht</strong> (Art. 21 DSGVO): Widerspruch gegen die Verarbeitung</li>
                    <li><strong>Datenportabilität</strong> (Art. 20 DSGVO): Export aller Daten in einem gängigen Format</li>
                    <li><strong>Widerruf der Einwilligung</strong> (Art. 7 Abs. 3 DSGVO): Widerruf jederzeit möglich, ohne dass die bisherige Verarbeitung unwirksam wird</li>
                </ul>
                <p>Zur Wahrnehmung dieser Rechte wenden Sie sich bitte an: <a href="mailto:datenschutz@lerndex.de">datenschutz@lerndex.de</a></p>

                <p>Sie haben außerdem das Recht, sich bei der zuständigen <strong>Datenschutz-Aufsichtsbehörde</strong> zu beschweren. Die zuständige Behörde richtet sich nach Ihrem Wohnort.</p>

                <!-- 12 -->
                <h2 id="kontakt">12. Kontakt & Beschwerden</h2>
                <p>Bei Fragen zum Datenschutz, insbesondere zum Schutz der Daten Ihres Kindes:</p>
                <p>
                    <strong>Nils Nehring – Nils-Digital</strong><br>
                    E-Mail: <a href="mailto:datenschutz@lerndex.de">datenschutz@lerndex.de</a><br>
                    Betreff bitte mit: „Datenschutz Lerndex"
                </p>
                <p>Wir antworten auf datenschutzbezogene Anfragen innerhalb von <strong>72 Stunden</strong>.</p>

                <hr style="margin: 2.5rem 0; opacity: 0.1;">
                <p><small>Diese Datenschutzerklärung kann bei wesentlichen Änderungen der App oder der Rechtslage aktualisiert werden. Über wesentliche Änderungen informieren wir Eltern per E-Mail. Stand: Juli 2026.</small></p>
            </div>
        </div>
    </main>
<?php
include __DIR__ . '/includes/footer.php';
include __DIR__ . '/includes/foot.php';
