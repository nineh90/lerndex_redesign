<?php
/**
 * Entwicklungs-Router für:  php -S localhost:8000 router.php
 *
 * Bildet die Rewrite-Regeln aus .htaccess nach, damit lokal dieselben URLs
 * gelten wie live. Wird NICHT auf den Produktionsserver deployed.
 */

$uri  = rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '');
$file = __DIR__ . $uri;

// ── Includes und Konfiguration nicht ausliefern (wie .htaccess Punkt 3) ──
if (preg_match('#^/includes/#', $uri) || preg_match('#^/config(\.example)?\.php$#', $uri)) {
    http_response_code(403);
    exit('403 Forbidden');
}

// ── .php-URLs auf die Clean URL umleiten (wie .htaccess Punkt 4) ──
if (preg_match('#^(.*)\.php$#', $uri, $m)) {
    $target = ($m[1] === '/index') ? '/' : $m[1];
    header('Location: ' . $target, true, 301);
    exit;
}

// ── Trailing Slash entfernen (wie .htaccess Punkt 5) ──
if ($uri !== '/' && substr($uri, -1) === '/' && !is_dir($file)) {
    header('Location: ' . rtrim($uri, '/'), true, 301);
    exit;
}

// ── Statische Dateien direkt ausliefern ──
if ($uri !== '/' && is_file($file)) {
    return false;
}

// ── Root ──
if ($uri === '/') {
    require __DIR__ . '/index.php';
    exit;
}

// ── Clean URL → PHP-Datei (wie .htaccess Punkt 6) ──
if (is_file($file . '.php')) {
    $_SERVER['SCRIPT_FILENAME'] = $file . '.php';
    require $file . '.php';
    exit;
}

// ── 404 ──
http_response_code(404);
require __DIR__ . '/404.php';
