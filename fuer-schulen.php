<?php
require_once __DIR__ . '/includes/site.php';

/*
 * Lerndex für Schulen.
 *
 * Quelle aller Aussagen: „Lerndex für Schulen – Stand 03.11.2026“ (PDF) und
 * der Branch `schule` in ../lerndex_app. Der Schulbereich laeuft in der
 * Web-App; die Pilotphase mit ersten Schulen beginnt im 2. Halbjahr 2026/27.
 * Schulen koennen sich nicht selbst anlegen – sie werden eingeladen. Deshalb
 * fuehrt die Seite auf eine Kontaktaufnahme, nicht auf eine Registrierung.
 *
 * Bewusst NICHT hier: der Name der Pilotschule (nur mit deren Zustimmung),
 * ein Link zur Web-App (Bezahlen im Web und Missbrauchsschutz fehlen noch).
 */

$page_title       = 'Für Schulen';
$page_title_full  = 'Lerndex für Schulen: KI-Lernbegleiter für Klassen 1 bis 8';
$page_h1          = 'Lerndex für Schulen';
$page_lead        = 'Lexi hilft beim Verstehen, nicht beim Abschreiben – jetzt auch im Unterricht. '
                  . 'Mit Klassen, Schülerkarten und Elternbrief. Wir suchen Schulen für unsere Pilotphase.';
$page_description = 'Lerndex für Grund- und weiterführende Schulen: Klassen anlegen, Schülerkarten drucken, '
                  . 'Aufgaben aus einem Foto verteilen, Lexi liest vor. Daten in Frankfurt, Pilotphase kostenfrei.';
$canonical        = SITE_URL . '/fuer-schulen';
$current_page     = 'fuer-schulen';
$force_mode       = 'parents';

$page_jsonld = [[
    '@context' => 'https://schema.org',
    '@type'    => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Startseite', 'item' => SITE_URL . '/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Für Schulen', 'item' => SITE_URL . '/fuer-schulen'],
    ],
]];

$schulKarten = [
    ['bot', 'bg-purple', 'Erklärt statt vorzusagen',
     'Lexi führt mit Rückfragen zur Lösung und verrät keine fertigen Antworten. Unpassende Fragen lehnt Lexi freundlich ab.'],
    ['volume-2', 'bg-teal', 'Lexi liest vor',
     'Jede Antwort lässt sich vorlesen, auf Wunsch automatisch. Formeln werden gesprochen. Wichtig für Kinder mit Förderbedarf.'],
    ['camera', 'bg-orange', 'Aufgaben aus Thema oder Foto',
     'Thema eintippen oder Arbeitsblatt bzw. Tafel fotografieren: Lexi erstellt 5 oder 10 Aufgaben, Sie wählen aus und verteilen sie an die Klasse.'],
    ['users', 'bg-blue', 'Klassen und Schülerkarten',
     'Namensliste einfügen, Karten drucken – acht pro A4-Seite. Das Kind scannt seine Karte am Tablet und ist angemeldet.'],
    ['smartphone', 'bg-green', 'Läuft auf den Geräten der Schule',
     'Im Browser auf Tablet, iPhone und PC – ohne Installation über einen App-Store. Auf geteilten Tablets meldet sich jedes Kind nach dem Lernen ab.'],
    ['house', 'bg-purple', 'Eltern mit an Bord',
     'Ein Elternbrief verbindet Eltern kostenlos mit ihrem Kind: Statistik, Lexi-Gespräche, Belohnungen. Zu Hause lernt das Kind mit eigener Karte weiter.'],
];

/* Wer sieht was – aus dem Rollenkonzept des Schulbereichs. */
$rollen  = ['Schulleitung', 'Lehrkraft', 'Eltern (verbunden)', 'Kind'];
$rechte  = [
    ['Klassen und Schülerliste',  ['nein', 'alle der Schule', 'nein', 'nein']],
    ['Statistik eines Kindes',    ['nein', 'ja', 'nur eigenes Kind', 'eigene']],
    ['Lexi-Gespräche',            ['nein', 'nein', 'nur eigenes Kind', 'eigene']],
    ['Aufgaben verteilen',        ['nein', 'ja', 'nein', 'bearbeiten']],
    ['Belohnungen festlegen',     ['nein', 'nein', 'ja', 'nein']],
    ['Lehrkräfte verwalten',      ['ja', 'nein', 'nein', 'nein']],
];

/* Interessenten-Mail: vorausgefuellt, damit die Angaben fuer ein erstes
   Gespraech gleich dabei sind. */
$schul_mailto = 'mailto:' . SITE_MAIL
    . '?subject=' . rawurlencode('Lerndex für unsere Schule')
    . '&body=' . rawurlencode(
        "Schule und Ort:\n"
      . "Ansprechpartner/in und Funktion:\n"
      . "Schulform und Klassenstufen:\n"
      . "Ungefähr wie viele Klassen bzw. Schüler/innen:\n"
      . "Geräte (Schul-Tablets, eigene Handys, PCs):\n\n"
      . "Was wir uns von Lerndex wünschen:\n"
    );

include __DIR__ . '/includes/head.php';
include __DIR__ . '/includes/navbar.php';
?>

    <main id="main">
        <?php include __DIR__ . '/includes/sections/page_hero.php'; ?>

        <section class="section benefits">
            <div class="container">
                <div class="section-header">
                    <span class="badge">Im Unterricht</span>
                    <h2>Was Lerndex in der Schule kann</h2>
                    <p>Für den Schulalltag gebaut – von der Klassenliste bis zum Elternbrief.</p>
                </div>

                <div class="benefits-grid schul-karten reveal-stagger">
                    <?php foreach ($schulKarten as [$ic, $bg, $titel, $text]): ?>
                        <article class="benefit-card">
                            <div class="icon-box <?= e($bg) ?>"><?php icon($ic); ?></div>
                            <h3><?= e($titel) ?></h3>
                            <p><?= e($text) ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="section how-it-works bg-light">
            <div class="container">
                <div class="section-header">
                    <span class="badge">Ablauf</span>
                    <h2>In fünf Schritten ist eine Klasse startklar</h2>
                    <p>Wir schalten Ihre Schule frei und schicken der Schulleitung einen Einladungslink.
                       Alles Weitere erledigen Sie selbst in der Schulverwaltung von Lerndex.</p>
                </div>
                <div class="steps-grid schul-schritte reveal-stagger">
                    <div class="step-card">
                        <div class="step-number">1</div>
                        <h3>Lehrkräfte anlegen</h3>
                        <p>Die Schulleitung legt die Lehrkräfte an. Jede bekommt eine QR-Karte und legt ihre eigene PIN fest.</p>
                    </div>
                    <div class="step-card">
                        <div class="step-number">2</div>
                        <h3>Klasse anlegen</h3>
                        <p>Name, Klassenstufe und Schulform – daraus ergeben sich Fächer und Niveau der Aufgaben.</p>
                    </div>
                    <div class="step-card">
                        <div class="step-number">3</div>
                        <h3>Schüler eintragen</h3>
                        <p>Die Namensliste auf einmal einfügen, ein Name pro Zeile. Vorname und Anfangsbuchstabe genügen.</p>
                    </div>
                    <div class="step-card">
                        <div class="step-number">4</div>
                        <h3>Karten und Elternbriefe drucken</h3>
                        <p>Schülerkarten zum Ausschneiden und ein Elternbrief pro Kind – direkt aus der Klassenansicht.</p>
                    </div>
                    <div class="step-card">
                        <div class="step-number">5</div>
                        <h3>Lernen, verteilen, auswerten</h3>
                        <p>Kinder scannen ihre Karte und lernen. Sie verteilen Aufgaben und sehen Lernzeit und Fortschritt je Kind.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="section-header">
                    <span class="badge">Rollen</span>
                    <h2>Wer sieht welche Daten</h2>
                    <p>Jede Rolle hat ein eigenes Konto. Was wer darf, prüft der Server bei jedem Zugriff –
                       nicht das Gerät.</p>
                </div>

                <div class="rollen-tabelle reveal">
                    <table>
                        <caption class="sr-only">Zugriffsrechte nach Rolle</caption>
                        <thead>
                            <tr>
                                <th scope="col">Daten</th>
                                <?php foreach ($rollen as $rolle): ?>
                                    <th scope="col"><?= e($rolle) ?></th>
                                <?php endforeach; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($rechte as [$daten, $werte]): ?>
                                <tr>
                                    <th scope="row"><?= e($daten) ?></th>
                                    <?php foreach ($werte as $wert): ?>
                                        <td class="<?= $wert === 'nein' ? 'ist-nein' : 'ist-ja' ?>"><?= e($wert) ?></td>
                                    <?php endforeach; ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div class="detail-note">
                    <?php icon('eye'); ?>
                    <div>
                        <h3>Bewusst so gewählt</h3>
                        <p>Lehrkräfte sehen keine Lexi-Gespräche, die Schulleitung sieht keine Schülerdaten.
                           Die Gespräche eines Kindes sehen nur das Kind selbst und seine verbundenen Eltern.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section ds-schule bg-light">
            <div class="container">
                <div class="section-header">
                    <span class="badge">Datenschutz</span>
                    <h2>Kinderdaten bleiben in der EU</h2>
                    <p>Bevor echte Schülerdaten eingetragen werden, ist der Datenschutz geklärt – nicht danach.</p>
                </div>

                <div class="ds-raster">
                    <div class="ds-standort reveal">
                        <p class="ds-ort-label"><?php icon('map-pin', 'icon-sm'); ?> Serverstandort</p>
                        <p class="ds-ort">Frankfurt am Main</p>
                        <p class="ds-ort-text">Lern- und Nutzungsdaten der Kinder liegen in einem Rechenzentrum in Deutschland.</p>
                        <ul class="ds-fakten">
                            <li><?php icon('check', 'icon-sm'); ?> Datenbank und Server-Funktionen in Frankfurt</li>
                            <li><?php icon('check', 'icon-sm'); ?> KI über Google Vertex AI in der EU</li>
                            <li><?php icon('check', 'icon-sm'); ?> Gespräche werden nicht zum KI-Training verwendet</li>
                            <li><?php icon('check', 'icon-sm'); ?> Keine Werbung</li>
                        </ul>
                    </div>

                    <div class="ds-karten reveal-stagger">
                        <article class="ds-karte">
                            <div class="icon-box bg-blue"><?php icon('user'); ?></div>
                            <h3>Vorname genügt</h3>
                            <p>Für eine Klasse reichen Vorname und Anfangsbuchstabe des Nachnamens.</p>
                        </article>
                        <article class="ds-karte">
                            <div class="icon-box bg-purple"><?php icon('lock-keyhole'); ?></div>
                            <h3>Verschlüsselt gespeichert</h3>
                            <p>PINs liegen verschlüsselt auf dem Server, Anmeldekarten und Codes nur als Prüfsumme.</p>
                        </article>
                        <article class="ds-karte">
                            <div class="icon-box bg-green"><?php icon('shield-check'); ?></div>
                            <h3>Rechte prüft der Server</h3>
                            <p>Wer was sehen darf, wird bei jedem Zugriff auf dem Server geprüft – nicht im Gerät.</p>
                        </article>
                        <article class="ds-karte">
                            <div class="icon-box bg-orange"><?php icon('house'); ?></div>
                            <h3>Kostenlos für Eltern</h3>
                            <p>Die Schullizenz deckt alle Kinder der Schule ab. Eltern verbinden sich ohne Abo.</p>
                        </article>
                    </div>
                </div>

                <div class="ds-vorher reveal">
                    <h3>Vor dem Start mit Ihrer Schule</h3>
                    <ol>
                        <li>
                            <span class="icon-box bg-purple"><?php icon('file-check'); ?></span>
                            <span><strong>Auftragsverarbeitungsvertrag</strong> nach Art. 28 DSGVO</span>
                        </li>
                        <li>
                            <span class="icon-box bg-purple"><?php icon('users'); ?></span>
                            <span><strong>Abstimmung</strong> mit Ihrer bzw. Ihrem Datenschutzbeauftragten</span>
                        </li>
                        <li>
                            <span class="icon-box bg-purple"><?php icon('mail'); ?></span>
                            <span><strong>Informationsblatt für Eltern:</strong> welche Daten, wofür, wo gespeichert</span>
                        </li>
                    </ol>
                    <p class="ds-vorher-fuss"><?php icon('check-circle', 'icon-sm'); ?> Erst danach werden echte Schülerdaten eingetragen.</p>
                </div>
            </div>
        </section>

        <section class="section cta-download">
            <div class="container">
                <div class="cta-box">
                    <div class="cta-text">
                        <h2>Pilotschule werden</h2>
                        <p>Geplant ist der Start mit ersten Pilotschulen zum zweiten Halbjahr 2026/27. Die Pilotphase
                           ist für Schule und Eltern kostenfrei und verpflichtet zu nichts. Schreiben Sie uns –
                           wir stellen Lerndex gern in einem kurzen Gespräch vor.</p>
                    </div>
                    <div class="cta-actions">
                        <a href="<?= e($schul_mailto) ?>" class="btn btn-invert btn-lg">
                            <?php icon('mail'); ?> Interesse melden
                        </a>
                    </div>
                    <p class="cta-note">
                        <?php icon('mail', 'icon-sm'); ?> <?= e(SITE_MAIL) ?>
                    </p>
                </div>
            </div>
        </section>
    </main>

<?php
include __DIR__ . '/includes/footer.php';
include __DIR__ . '/includes/foot.php';
