<?php
require_once __DIR__ . '/includes/site.php';

$page_title   = 'Impressum';
$page_noindex = true;
$current_page = 'impressum';

include __DIR__ . '/includes/head.php';
include __DIR__ . '/includes/navbar.php';
?>

    <main id="main" class="legal-page">
        <div class="container">
            <a href="/" class="back-link">
                <?php icon('arrow-left'); ?> Zurück zur Startseite
            </a>
            <div class="legal-content">
                <h1>Impressum</h1>
                <p class="subtitle">Angaben gemäß § 5 DDG</p>

                <h2>Anbieter & Betreiber</h2>
                <p>
                    <strong>Nils Nehring</strong><br>
                    Nils-Digital<br>
                    Permer Stollen 6<br>
                    49479 Ibbenbüren
                </p>

                <h2>Kontakt</h2>
                <p>
                    Telefon: [Telefonnummer]<br>
                    E-Mail: <a href="mailto:info@lerndex.de">info@lerndex.de</a><br>
                    Website: <a href="https://lerndex.de">https://lerndex.de</a>
                </p>

                <h2>Redaktionell verantwortlich</h2>
                <p>
                    Nils Nehring<br>
                    Permer Stollen 6<br>
                    49479 Ibbenbüren
                </p>

                <h2>Verantwortlich für die App</h2>
                <p>
                    Lerndex ist eine Lern-App für Kinder und Jugendliche, entwickelt und betrieben von Nils-Digital.<br>
                    Verfügbar im <strong>Google Play Store</strong>. Eine Version für den Apple App Store ist in Vorbereitung.
                </p>

                <h2>Umsatzsteuer</h2>
                <p>
                    Umsatzsteuer-Identifikationsnummer gemäß § 27a UStG:<br>
                    [USt-IdNr. eintragen oder: „Kleinunternehmer gemäß § 19 UStG – keine USt-IdNr. erforderlich"]
                </p>

                <h2>Berufsrechtliche Regelungen</h2>
                <p>Nils-Digital ist ein gewerblicher Einzelunternehmer im Bereich Softwareentwicklung und digitale Dienstleistungen. Es unterliegen keine besonderen berufsrechtlichen Regelungen.</p>

                <h2>Streitschlichtung</h2>

                <h3>EU-Streitschlichtung</h3>
                <p>Die Europäische Kommission stellt eine Plattform zur Online-Streitbeilegung (OS) bereit:<br>
                <a href="https://ec.europa.eu/consumers/odr/" target="_blank">https://ec.europa.eu/consumers/odr/</a><br>
                Unsere E-Mail-Adresse finden Sie oben im Impressum.</p>

                <h3>Verbraucherstreitbeilegung</h3>
                <p>Wir sind nicht bereit oder verpflichtet, an Streitbeilegungsverfahren vor einer Verbraucherschlichtungsstelle teilzunehmen.</p>

                <h2>Haftung für Inhalte</h2>
                <p>Als Diensteanbieter sind wir gemäß § 7 Abs. 1 DDG für eigene Inhalte auf diesen Seiten nach den allgemeinen Gesetzen verantwortlich. Nach §§ 8 bis 10 DDG sind wir als Diensteanbieter jedoch nicht verpflichtet, übermittelte oder gespeicherte fremde Informationen zu überwachen oder nach Umständen zu forschen, die auf eine rechtswidrige Tätigkeit hinweisen.</p>
                <p>Verpflichtungen zur Entfernung oder Sperrung der Nutzung von Informationen nach den allgemeinen Gesetzen bleiben hiervon unberührt. Eine diesbezügliche Haftung ist jedoch erst ab dem Zeitpunkt der Kenntnis einer konkreten Rechtsverletzung möglich.</p>

                <h2>Haftung für Links</h2>
                <p>Unser Angebot enthält Links zu externen Websites Dritter, auf deren Inhalte wir keinen Einfluss haben. Deshalb können wir für diese fremden Inhalte auch keine Gewähr übernehmen. Für die Inhalte der verlinkten Seiten ist stets der jeweilige Anbieter oder Betreiber der Seiten verantwortlich.</p>

                <h2>Urheberrecht</h2>
                <p>Die durch die Seitenbetreiber erstellten Inhalte und Werke auf diesen Seiten unterliegen dem deutschen Urheberrecht. Die Vervielfältigung, Bearbeitung, Verbreitung und jede Art der Verwertung außerhalb der Grenzen des Urheberrechts bedürfen der schriftlichen Zustimmung des jeweiligen Autors bzw. Erstellers.</p>

                <div class="info-box">
                    <p><strong>Datenschutz:</strong> Informationen zum Umgang mit personenbezogenen Daten, insbesondere zum Schutz von Kinderdaten, finden Sie in unserer <a href="/datenschutz" style="color: var(--secondary);">Datenschutzerklärung</a>.</p>
                </div>

                <hr style="margin: 2.5rem 0; opacity: 0.1;">
                <p><small>Stand: Juli 2026</small></p>
            </div>
        </div>
    </main>
<?php
include __DIR__ . '/includes/footer.php';
include __DIR__ . '/includes/foot.php';
