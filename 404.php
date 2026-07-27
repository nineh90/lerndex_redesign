<?php
require_once __DIR__ . '/includes/site.php';

http_response_code(404);

$page_title   = 'Seite nicht gefunden';
$page_noindex = true;
$current_page = '';

include __DIR__ . '/includes/head.php';
include __DIR__ . '/includes/navbar.php';
?>

    <main id="main" class="section error-page">
        <div class="container centered-text">
            <p class="error-code">404</p>
            <h1>Diese Seite gibt es nicht.</h1>
            <p class="lead">Vielleicht wurde sie verschoben oder der Link hat sich vertippt. Hier geht es weiter:</p>

            <div class="error-links">
                <a href="/" class="btn btn-primary btn-lg">Zur Startseite</a>
                <a href="/faq" class="btn btn-ghost">Häufige Fragen</a>
                <a href="/kontakt" class="btn btn-ghost">Kontakt</a>
            </div>
        </div>
    </main>

<?php
include __DIR__ . '/includes/footer.php';
include __DIR__ . '/includes/foot.php';
