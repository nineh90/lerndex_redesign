<?php
/**
 * Front-Controller für Vercel.
 *
 * Vercel behandelt bei Zero-Config ausschliesslich Dateien in api/ als
 * Serverless Function – ein Glob auf die Seiten im Wurzelverzeichnis findet
 * dort nichts ("doesn't match any Serverless Functions inside the `api`
 * directory"). Statt die Seiten umzuziehen und damit vom Apache-Layout
 * abzuweichen, laeuft auf Vercel alles ueber diese eine Funktion; sie bindet
 * die passende Seitendatei aus dem Wurzelverzeichnis ein.
 *
 * Moeglich ist das, weil saemtliche Includes der Seiten mit __DIR__ arbeiten
 * und damit unabhaengig davon aufloesen, von wo aus sie eingebunden werden.
 *
 * Auf dem Apache-Hosting wird diese Datei nie aufgerufen – dort uebernehmen
 * die Rewrites aus .htaccess. Lokal macht router.php dasselbe.
 */

declare(strict_types=1);

$root = dirname(__DIR__);

/* Der angefragte Pfad kommt als Query-Parameter aus den Rewrites in
   vercel.json. Das ist bewusst explizit: nach einem Rewrite ist nicht
   zugesichert, welchen Pfad REQUEST_URI noch traegt. Der Rueckfallweg
   darunter greift nur, wenn die Datei direkt aufgerufen wird. */
$page = (string) ($_GET['page'] ?? '');

if ($page === '') {
    $path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
    $page = trim($path, '/');
}

if ($page === '' || $page === 'index') {
    require $root . '/index.php';
    exit;
}

/* Weisse Liste statt Blockliste: nur ein einzelnes Pfadsegment aus
   Kleinbuchstaben, Ziffern und Bindestrich. Damit sind Verzeichniswechsel
   ("../"), Zugriffe auf /includes/ und jede Endung von vornherein aus. */
if (preg_match('#^[a-z0-9][a-z0-9-]*$#', $page)) {
    $file = $root . '/' . $page . '.php';

    if (is_file($file)) {
        require $file;
        exit;
    }
}

/* 404.php setzt seinen Statuscode selbst. */
require $root . '/404.php';
