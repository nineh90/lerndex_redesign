<?php
/**
 * Proxy zwischen Formular und n8n.
 *
 * Drei Gründe, warum das nicht direkt aus dem Browser gepostet wird:
 *   1. Die Webhook-URL steht nicht im Quelltext.
 *   2. Serverseitige Prüfung, Honeypot und ein einfaches Rate-Limit.
 *   3. Einheitliche Antwort, damit ein späterer Backend-Wechsel das
 *      Frontend nicht anfasst.
 */

declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');

function fail(string $msg, int $code = 400): never
{
    http_response_code($code);
    echo json_encode(['ok' => false, 'message' => $msg], JSON_UNESCAPED_UNICODE);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    fail('Nur POST erlaubt.', 405);
}

$payload = json_decode(file_get_contents('php://input') ?: '', true);
if (!is_array($payload)) {
    fail('Ungültige Anfrage.');
}

// ── Honeypot: für Menschen unsichtbar, Bots füllen es aus ──
if (!empty($payload['website'])) {
    // Bewusst Erfolg melden, damit der Bot nichts lernt
    echo json_encode(['ok' => true, 'message' => 'Danke!'], JSON_UNESCAPED_UNICODE);
    exit;
}

// ── Rate-Limit: max. 5 Absendungen pro Stunde und IP ──
$bucket = sys_get_temp_dir() . '/lerndex_rate_' . md5($_SERVER['REMOTE_ADDR'] ?? 'cli');
$now    = time();
$hits   = is_file($bucket) ? array_filter((array) json_decode((string) file_get_contents($bucket), true),
                                          static fn($t) => $t > $now - 3600) : [];

if (count($hits) >= 5) {
    fail('Zu viele Anfragen. Bitte versuch es später noch einmal.', 429);
}

// ── Pflichtfelder je Formular ──
$form   = (string) ($payload['form'] ?? 'kontakt');
$needed = $form === 'support'
    ? ['device', 'os', 'appVersion', 'description']
    : ['name', 'email', 'subject', 'message'];

foreach ($needed as $field) {
    if (trim((string) ($payload[$field] ?? '')) === '') {
        fail('Bitte fülle alle Pflichtfelder aus.');
    }
}

if (empty($payload['privacy'])) {
    fail('Bitte bestätige die Datenschutzerklärung.');
}

$mail = trim((string) ($payload['email'] ?? ''));
if ($mail !== '' && !filter_var($mail, FILTER_VALIDATE_EMAIL)) {
    fail('Bitte gib eine gültige E-Mail-Adresse an.');
}

// ── Konfiguration ──
$configFile = __DIR__ . '/../config.php';
if (!is_file($configFile)) {
    fail('Das Formular ist noch nicht mit n8n verbunden. Bitte schreib uns direkt an info@lerndex.de.', 503);
}

$config = require $configFile;
$target = $form === 'support' && !empty($config['n8n_support'])
    ? $config['n8n_support']
    : ($config['n8n_contact'] ?? '');

if ($target === '') {
    fail('Das Formular ist noch nicht mit n8n verbunden. Bitte schreib uns direkt an info@lerndex.de.', 503);
}

// ── Weiterreichen ──
$body = json_encode([
    'form'      => $form,
    'data'      => array_diff_key($payload, ['website' => null]),
    'meta'      => [
        'receivedAt' => date('c'),
        'userAgent'  => substr((string) ($_SERVER['HTTP_USER_AGENT'] ?? ''), 0, 300),
        'referer'    => substr((string) ($_SERVER['HTTP_REFERER'] ?? ''), 0, 300),
    ],
], JSON_UNESCAPED_UNICODE);

$headers = ['Content-Type: application/json'];
if (!empty($config['n8n_token'])) {
    $headers[] = 'Authorization: Bearer ' . $config['n8n_token'];
}

$ch = curl_init($target);
curl_setopt_array($ch, [
    CURLOPT_POST           => true,
    CURLOPT_POSTFIELDS     => $body,
    CURLOPT_HTTPHEADER     => $headers,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT        => 10,
]);

$response = curl_exec($ch);
$status   = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
$error    = curl_error($ch);
curl_close($ch);

if ($response === false || $status >= 400) {
    error_log('n8n-Weiterleitung fehlgeschlagen: ' . ($error ?: 'HTTP ' . $status));
    fail('Das hat gerade nicht geklappt. Bitte versuch es später oder schreib an info@lerndex.de.', 502);
}

$hits[] = $now;
@file_put_contents($bucket, json_encode(array_values($hits)));

echo json_encode(['ok' => true, 'message' => 'Danke! Wir melden uns.'], JSON_UNESCAPED_UNICODE);
