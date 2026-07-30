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
                         . 'Eine iOS-Version ist in Vorbereitung – schreib uns gern über das Kontaktformular, dann '
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
