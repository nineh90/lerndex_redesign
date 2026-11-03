<?php
require_once __DIR__ . '/site.php';

/**
 * Alle FAQ-Inhalte an einer Stelle.
 *
 * Zwei Abnehmer: die Darstellung in sections/faq.php und das
 * FAQPage-JSON-LD auf /faq. So kann die Antwort in der Suche nie von
 * der Antwort auf der Seite abweichen.
 *
 * 'teaser' => true markiert die Fragen, die auf der Startseite stehen.
 */
function faq_groups(): array
{
    return [
        [
            'icon'  => '📚',
            'title' => 'Lerninhalte & App',
            'items' => [
                [
                    'q' => 'Für welches Alter ist Lerndex geeignet?',
                    'a' => 'Lerndex deckt aktuell die Klassen ' . GRADE_MIN . ' bis ' . GRADE_MAX . ' ab – also etwa '
                         . AGE_MIN . ' bis ' . AGE_MAX . ' Jahre. Die Fragen passen sich automatisch an Klasse und '
                         . 'Schulform deines Kindes an, egal ob Grundschule, Gymnasium, Realschule oder Gesamtschule. '
                         . 'Für Klasse 1 und 2 gibt es einen eigenen Modus mit Vorlesefunktion, damit auch Leseanfänger '
                         . 'allein zurechtkommen. Höhere Klassenstufen bauen wir Schritt für Schritt aus.',
                    'teaser' => true,
                ],
                [
                    'q' => 'Welche Fächer deckt Lerndex ab?',
                    'a' => 'In der Grundschule sind es Mathe, Deutsch, Englisch und Sachkunde. Ab der weiterführenden '
                         . 'Schule treten Biologie, Chemie, Physik und Geschichte an die Stelle von Sachkunde – dann '
                         . 'sind es sieben Fächer. In Klasse 1 und 2 lernt dein Kind stattdessen im Early-Learner-Modus '
                         . 'mit Zahlen und Buchstaben. Im Elternbereich lassen sich einzelne Fächer ausblenden, wenn '
                         . 'dein Kind sich auf bestimmte Bereiche konzentrieren soll.',
                    'teaser' => true,
                ],
                [
                    'q' => 'Ist der Inhalt am Lehrplan ausgerichtet?',
                    'a' => 'Ja. Beim Einrichten eines Kindprofils gibst du Klasse und Schulform an – Lerndex passt die '
                         . 'Quizfragen und den KI-Tutor automatisch an das entsprechende Niveau an.',
                ],
                [
                    'q' => 'Wie funktioniert der KI-Tutor genau?',
                    'a' => 'Der KI-Tutor basiert auf Google Gemini und wird durch spezielle Prompts so gesteuert, dass '
                         . 'er pädagogisch wertvoll erklärt – und nicht einfach nur Lösungen vorgibt. Dein Kind lernt '
                         . 'durch gezielte Fragen und Erklärungen, statt nur Antworten abzuschreiben.',
                    'teaser' => true,
                ],
                [
                    'q' => 'Auf welchen Geräten funktioniert Lerndex?',
                    'a' => 'Lerndex ist aktuell für Android-Smartphones und -Tablets im Google Play Store verfügbar. '
                         . 'Eine iOS-Version ist in Vorbereitung – schreib uns gern eine E-Mail, dann '
                         . 'sagen wir dir Bescheid, sobald sie da ist.',
                ],
                [
                    'q' => 'Funktioniert Lerndex auch offline?',
                    'a' => 'Für den KI-Tutor und neue Quizfragen wird eine Internetverbindung benötigt. Lerndex lädt '
                         . 'Inhalte jedoch vorab im Hintergrund, sodass der Einstieg ins Quiz auch bei schwacher '
                         . 'Verbindung flüssig funktioniert.',
                ],
            ],
        ],
        [
            'icon'  => '🔒',
            'title' => 'Eltern & Sicherheit',
            'items' => [
                [
                    'q' => 'Was kann ich als Elternteil im Dashboard sehen?',
                    'a' => 'Im Eltern-Dashboard siehst du in Echtzeit: XP-Fortschritt, aktuelle Streak, echte Lernzeit '
                         . '(nur aktive Nutzung, kein passives Herumscrollen), Quiz-Ergebnisse und alle Chats deines '
                         . 'Kindes mit dem KI-Tutor – auch nachträglich.',
                    'teaser' => true,
                ],
                [
                    'q' => 'Kann mein Kind unangemessene Inhalte anfragen?',
                    'a' => 'Lerndex verfügt über ein mehrstufiges Kinderschutzsystem. Der KI-Tutor ist strikt auf '
                         . 'schulische Themen beschränkt und gibt ausschließlich pädagogisch geprüfte Antworten. '
                         . 'Sensible Anfragen werden automatisch erkannt, blockiert und du als Elternteil wirst '
                         . 'benachrichtigt.',
                ],
                [
                    'q' => 'Kann ich als Elternteil eigene Aufgaben erstellen?',
                    'a' => 'Ja. Du kannst ein Foto einer Hausaufgabe machen – Lerndex erkennt die Aufgabe automatisch '
                         . 'und erstellt daraus passende Übungsfragen. Bevor dein Kind sie sieht, gibst du sie frei.',
                ],
                [
                    'q' => 'Sieht mein Kind Werbung?',
                    'a' => 'Nein, Lerndex ist komplett werbefrei, um eine ablenkungsfreie Lernumgebung zu garantieren.',
                ],
                [
                    'q' => 'Ist die App DSGVO-konform?',
                    'a' => 'Ja. Lerndex wurde von Anfang an DSGVO-konform entwickelt. Alle Lern- und Nutzungsdaten '
                         . 'werden in einem europäischen Rechenzentrum gespeichert, es werden keine Daten an Dritte '
                         . 'verkauft und wir erheben nur, was für den Lernbetrieb nötig ist. Für die Antworten des '
                         . 'KI-Tutors werden die Gespräche an Google Vertex AI übertragen – vertraglich ausgeschlossen '
                         . 'ist dabei, dass sie zum Training von KI-Modellen verwendet werden.',
                ],
            ],
        ],
        [
            'icon'  => '💳',
            'title' => 'Abo & Kosten',
            'items' => [
                [
                    'q' => 'Gibt es eine kostenlose Testphase?',
                    'a' => 'Ja. Du kannst Lerndex ' . TRIAL_DAYS . ' Tage lang kostenlos und ohne Einschränkungen '
                         . 'testen. Erst danach wird das gewählte Abonnement aktiv – und es ist jederzeit monatlich '
                         . 'kündbar.',
                    'teaser' => true,
                ],
                [
                    'q' => 'Was ist der Unterschied zwischen Solo, Duo und Family?',
                    'a' => 'Die Pläne unterscheiden sich nur in der Anzahl der Kinderprofile: Solo ('
                         . PLANS['solo']['price'] . ' €/Monat) für 1 Kind, Duo (' . PLANS['duo']['price']
                         . ' €/Monat) für 2 Kinder und Family (' . PLANS['family']['price'] . ' €/Monat) für bis zu '
                         . '4 Kinder. Im Family-Plan lassen sich weitere Kinder für je ' . EXTRA_CHILD_PRICE
                         . ' €/Monat ergänzen. Alle Funktionen sind in jedem Plan vollständig enthalten.',
                ],
                [
                    'q' => 'Wie kündige ich mein Abonnement?',
                    'a' => 'Die Kündigung läuft direkt über den Google Play Store – genauso wie bei jeder anderen App. '
                         . 'Kein versteckter Kündigungsprozess, keine Mindestlaufzeit.',
                ],
            ],
        ],
        [
            'icon'  => '🏫',
            'title' => 'Lerndex für Schulen',
            /* Neutral formuliert (weder „du“ noch „Sie“): die Gruppe richtet sich
               an Schulen, steht aber auf derselben Seite wie die Elternfragen.
               Quelle: „Lerndex für Schulen – Stand 03.11.2026“. */
            'items' => [
                [
                    'q' => 'Gibt es Lerndex auch für Schulen?',
                    'a' => 'Ja. Lerndex hat einen eigenen Schulbereich: Die Schulleitung legt Lehrkräfte an, Lehrkräfte '
                         . 'legen Klassen an, drucken Schülerkarten und Elternbriefe und verteilen Aufgaben an die Klasse. '
                         . 'Geplant ist der Start mit ersten Pilotschulen zum zweiten Halbjahr 2026/27. Schulen werden von '
                         . 'uns freigeschaltet und können sich nicht selbst anlegen – Interessierte Schulen schreiben uns '
                         . 'einfach an ' . SITE_MAIL . '.',
                ],
                [
                    'q' => 'Was kostet Lerndex für Schulen und Eltern?',
                    'a' => 'Die Pilotphase ist für Schule und Eltern kostenfrei und unverbindlich. Kinder, die über die '
                         . 'Schule kommen, deckt die Schullizenz ab: Eltern verbinden sich ohne Abo mit ihrem Schulkind. '
                         . 'Nur wer zusätzlich ein eigenes Kind ohne Schule anlegen möchte, braucht wie bisher ein Abo.',
                ],
                [
                    'q' => 'Brauchen die Kinder ein eigenes Gerät?',
                    'a' => 'Nein. Der Schulbereich läuft im Browser auf Tablet, iPhone und PC, ohne Installation über '
                         . 'einen App-Store. Jedes Kind meldet sich mit seiner Schülerkarte per QR-Code an. Auf geteilten '
                         . 'Schul-Tablets meldet es sich nach dem Lernen wieder ab, und das nächste Kind scannt seine Karte.',
                ],
                [
                    'q' => 'Sehen Lehrkräfte die Gespräche der Kinder mit Lexi?',
                    'a' => 'Nein. Lehrkräfte sehen die Klassen- und Einzelstatistik – Lernzeit, Quizze, Fortschritt – und '
                         . 'verteilen Aufgaben. Die Lexi-Gespräche eines Kindes sehen nur das Kind selbst und seine '
                         . 'verbundenen Eltern. Die Schulleitung verwaltet nur die Lehrkräfte und sieht keine Schülerdaten.',
                ],
                [
                    'q' => 'Wie werden Schülerdaten geschützt?',
                    'a' => 'Lern- und Nutzungsdaten liegen in einem Rechenzentrum in Frankfurt am Main, die KI läuft über '
                         . 'Google Vertex AI in der EU. Für eine Klasse genügen Vorname und Anfangsbuchstabe des '
                         . 'Nachnamens. Was wer sehen darf, prüft der Server bei jedem Zugriff. Bevor echte Schülerdaten '
                         . 'eingetragen werden, schließen wir mit der Schule einen Auftragsverarbeitungsvertrag nach '
                         . 'Art. 28 DSGVO und stellen ein Informationsblatt für Eltern bereit.',
                ],
                [
                    'q' => 'Können Eltern sehen, was ihr Kind in der Schule lernt?',
                    'a' => 'Ja. Über den Elternbrief verbinden sich Eltern kostenlos mit ihrem Schulkind und sehen im '
                         . 'Eltern-Dashboard Statistik, Lexi-Gespräche und Belohnungen. Mit der zweiten Karte aus dem Brief '
                         . 'lernt das Kind zu Hause mit demselben Fortschritt weiter. Die Verbindung lässt sich jederzeit '
                         . 'trennen; in der Schule ändert sich dadurch nichts.',
                ],
            ],
        ],
    ];
}

/** Baut das FAQPage-JSON-LD aus denselben Daten. */
function faq_jsonld(): array
{
    $entities = [];

    foreach (faq_groups() as $group) {
        foreach ($group['items'] as $item) {
            $entities[] = [
                '@type'          => 'Question',
                'name'           => $item['q'],
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => $item['a']],
            ];
        }
    }

    return [
        '@context'   => 'https://schema.org',
        '@type'      => 'FAQPage',
        'mainEntity' => $entities,
    ];
}
