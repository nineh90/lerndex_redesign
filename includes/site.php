<?php
/**
 * Zentrale Konstanten und Navigationsstruktur.
 *
 * Alles, was auf mehreren Seiten auftaucht, steht hier genau einmal.
 * Von head.php automatisch eingebunden.
 */

// ── Basis ────────────────────────────────────
const SITE_URL   = 'https://lerndex.de';
const SITE_NAME  = 'Lerndex';
const SITE_MAIL  = 'info@lerndex.de';

// ── Stores ───────────────────────────────────
const PLAY_STORE_URL = 'https://play.google.com/store/apps/details?id=de.nilsdigital.lerndex&hl=de';
const IOS_AVAILABLE  = false;   // auf true setzen, sobald die App im App Store ist
const APP_STORE_URL  = '';

// ── Produktfakten ────────────────────────────
// Quelle der Wahrheit ist die App (../lerndex_app), nicht der Seitentext.
const GRADE_MIN = 1;
const GRADE_MAX = 8;
const AGE_MIN   = 6;
const AGE_MAX   = 14;
const TRIAL_DAYS = 14;

/** Aboplaene – Preise verifiziert gegen subscription_model.dart */
const PLANS = [
    'solo'   => ['name' => 'Solo',   'price' => '12,99', 'schema' => '12.99', 'children' => 'Für 1 Kind'],
    'duo'    => ['name' => 'Duo',    'price' => '24,99', 'schema' => '24.99', 'children' => 'Für 2 Kinder'],
    'family' => ['name' => 'Family', 'price' => '39,99', 'schema' => '39.99', 'children' => 'Bis zu 4 Kinder'],
];
const EXTRA_CHILD_PRICE = '6,99';

// ── Hauptnavigation ──────────────────────────
// key => [Label, URL].  Der key wird mit $current_page verglichen.
const NAV_MAIN = [
    'fuer-eltern' => ['Für Eltern',  '/fuer-eltern'],
    'fuer-kinder' => ['Für Kinder',  '/fuer-kinder'],
    'funktionen'  => ['Funktionen',  '/funktionen'],
    'sicherheit'  => ['Sicherheit',  '/sicherheit'],
    'preise'      => ['Preise',      '/preise'],
    'faq'         => ['FAQ',         '/faq'],
];

const NAV_LEGAL = [
    'impressum'   => ['Impressum',   '/impressum'],
    'datenschutz' => ['Datenschutz', '/datenschutz'],
    'agb'         => ['AGB',         '/agb'],
];

const NAV_SUPPORT = [
    'kontakt' => ['Kontakt', '/kontakt'],
    'support' => ['Support', '/support'],
];

/** Kurzform fuer Ausgabe mit Escaping. */
function e(?string $value): string
{
    return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
}

/**
 * Gibt zwei Varianten desselben Inhalts aus – eine fuer Eltern, eine fuer Kinder.
 * Beide stehen im HTML, CSS blendet die inaktive aus (siehe 03-components.css).
 *
 * Der Text darf Markup enthalten und wird bewusst NICHT escaped: er stammt
 * aus den Templates, nicht von Nutzern.
 *
 *   dual('Ihr Kind lernt …', 'Du lernst …');
 *   dual('Sicherheit', 'Für dich', 'h3');
 */
function dual(string $parents, string $kids, string $tag = 'span'): void
{
    echo "<{$tag} class=\"for-parents\">{$parents}</{$tag}>";
    echo "<{$tag} class=\"for-kids\">{$kids}</{$tag}>";
}
