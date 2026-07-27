/**
 * Fragen für das Demo-Quiz auf der Webseite.
 *
 * Struktur bewusst identisch zu ../lerndexgame/data/*.js gehalten, damit
 * Fragen später zwischen Spiel, Webseite und App wandern können, ohne
 * konvertiert zu werden.
 *
 *   { q: Frage, a: [Antworten], correct: Index, why: Erklärung }
 *
 * Die Erklärung ist Pflicht – sie ist der Punkt der Demo. Lerndex sagt
 * nicht "falsch", sondern warum.
 */
window.LERNDEX_QUIZ = {

    bands: [
        { id: '1-2', label: 'Klasse 1–2' },
        { id: '3-4', label: 'Klasse 3–4' },
        { id: '5-6', label: 'Klasse 5–6' },
        { id: '7-8', label: 'Klasse 7–8' }
    ],

    subjects: [
        { id: 'mathe',    label: 'Mathe',     emoji: '➗' },
        { id: 'deutsch',  label: 'Deutsch',   emoji: '📖' },
        { id: 'englisch', label: 'Englisch',  emoji: '🌍' },
        { id: 'wissen',   label: 'Sachkunde', emoji: '🌱' }
    ],

    questions: {
        '1-2': {
            mathe: [
                { q: 'Was ist 7 + 5?', a: ['11', '12', '13', '10'], correct: 1,
                  why: 'Rechne in zwei Schritten: 7 + 3 sind 10, dann noch 2 dazu – das sind 12.' },
                { q: 'Welche Zahl kommt vor 20?', a: ['21', '18', '19', '22'], correct: 2,
                  why: 'Beim Rückwärtszählen kommt vor der 20 die 19. Danach käme die 21.' },
                { q: 'Wie viele Ecken hat ein Dreieck?', a: ['2', '3', '4', '5'], correct: 1,
                  why: 'Im Wort steckt die Antwort: „Drei"-eck. Drei Ecken und drei Seiten.' }
            ],
            deutsch: [
                { q: 'Welches Wort schreibt man groß?', a: ['laufen', 'Hund', 'schnell', 'und'], correct: 1,
                  why: 'Nomen schreibt man groß. Vor „Hund" kann man der, die oder das setzen – bei „laufen" nicht.' },
                { q: 'Wie viele Silben hat „Banane"?', a: ['1', '2', '3', '4'], correct: 2,
                  why: 'Klatsche beim Sprechen mit: Ba-na-ne. Das sind drei Silben.' },
                { q: 'Welcher Buchstabe fehlt: S_nne', a: ['a', 'o', 'u', 'i'], correct: 1,
                  why: 'Sonne wird mit „o" geschrieben. Sprich es langsam: S-o-nne.' }
            ],
            englisch: [
                { q: 'Was heißt „Hund" auf Englisch?', a: ['cat', 'dog', 'bird', 'fish'], correct: 1,
                  why: '„dog" ist der Hund. „cat" wäre die Katze.' },
                { q: 'Was heißt „red"?', a: ['blau', 'grün', 'rot', 'gelb'], correct: 2,
                  why: '„red" heißt rot. Blau wäre „blue", grün „green".' },
                { q: 'Wie sagt man „Guten Morgen"?', a: ['Good night', 'Good morning', 'Goodbye', 'Hello'], correct: 1,
                  why: '„morning" ist der Morgen. „night" wäre die Nacht.' }
            ],
            wissen: [
                { q: 'Welches Tier legt Eier?', a: ['Kuh', 'Huhn', 'Hund', 'Pferd'], correct: 1,
                  why: 'Hühner sind Vögel und Vögel legen Eier. Kühe, Hunde und Pferde bekommen Junge.' },
                { q: 'Wie viele Jahreszeiten gibt es?', a: ['2', '3', '4', '5'], correct: 2,
                  why: 'Frühling, Sommer, Herbst und Winter – vier Stück, jede etwa drei Monate lang.' },
                { q: 'Was brauchen Pflanzen zum Wachsen?', a: ['Nur Erde', 'Licht und Wasser', 'Nur Luft', 'Nur Dunkelheit'], correct: 1,
                  why: 'Ohne Licht und Wasser kann eine Pflanze keine Nahrung herstellen und geht ein.' }
            ]
        },

        '3-4': {
            mathe: [
                { q: 'Was ist 6 × 7?', a: ['42', '48', '36', '49'], correct: 0,
                  why: 'Rechne über 6 × 6 = 36 und zähle noch eine 6 dazu: 42.' },
                { q: 'Wie viel ist die Hälfte von 84?', a: ['32', '42', '44', '48'], correct: 1,
                  why: 'Teile getrennt: die Hälfte von 80 ist 40, die Hälfte von 4 ist 2. Zusammen 42.' },
                { q: 'Wie viele Minuten hat 1,5 Stunden?', a: ['75', '90', '100', '120'], correct: 1,
                  why: 'Eine Stunde hat 60 Minuten, eine halbe 30. Zusammen 90.' }
            ],
            deutsch: [
                { q: 'Welches Wort ist ein Verb?', a: ['Tisch', 'schnell', 'springen', 'blau'], correct: 2,
                  why: 'Verben sagen, was jemand tut. „springen" ist eine Tätigkeit, „blau" nur eine Eigenschaft.' },
                { q: 'Wie lautet die Mehrzahl von „das Buch"?', a: ['die Buchs', 'die Bücher', 'die Buche', 'die Buchen'], correct: 1,
                  why: 'Im Plural wird das „u" zum „ü" und es kommt „-er" dazu: die Bücher.' },
                { q: 'Welcher Satz ist richtig?', a: ['Ich gehe zur Schule.', 'Ich gehen zur Schule.', 'Ich geht zur Schule.', 'Ich gingst zur Schule.'], correct: 0,
                  why: 'Zu „ich" gehört die Endung „-e": ich gehe. „gehen" passt zu wir oder sie.' }
            ],
            englisch: [
                { q: 'Wie fragt man nach dem Namen?', a: ['How old are you?', 'What is your name?', 'Where are you?', 'How are you?'], correct: 1,
                  why: '„name" heißt Name. „How old" fragt nach dem Alter.' },
                { q: 'Was heißt „Ich habe eine Schwester"?', a: ['I have a sister.', 'I am a sister.', 'I has a sister.', 'I have a brother.'], correct: 0,
                  why: 'Bei „I" heißt es immer „have", nie „has". „brother" wäre der Bruder.' },
                { q: 'Welches Wort ist eine Farbe?', a: ['table', 'green', 'seven', 'happy'], correct: 1,
                  why: '„green" heißt grün. „seven" ist die Sieben, „happy" heißt glücklich.' }
            ],
            wissen: [
                { q: 'Welcher Planet ist der Sonne am nächsten?', a: ['Venus', 'Merkur', 'Erde', 'Mars'], correct: 1,
                  why: 'Merkur ist der innerste Planet. Danach kommen Venus, Erde und Mars.' },
                { q: 'Wie nennt man Tiere, die Fleisch fressen?', a: ['Pflanzenfresser', 'Allesfresser', 'Fleischfresser', 'Sammler'], correct: 2,
                  why: 'Fleischfresser ernähren sich von anderen Tieren – zum Beispiel Wolf und Löwe.' },
                { q: 'Woraus besteht Wasser?', a: ['Sauerstoff und Wasserstoff', 'Nur Sauerstoff', 'Salz und Wasser', 'Kohlenstoff'], correct: 0,
                  why: 'Deshalb schreibt man Wasser als H₂O: zwei Teile Wasserstoff, ein Teil Sauerstoff.' }
            ]
        },

        '5-6': {
            mathe: [
                { q: 'Was ist 3/4 von 100?', a: ['25', '50', '75', '80'], correct: 2,
                  why: 'Ein Viertel von 100 sind 25. Drei davon sind 75.' },
                { q: 'Wie groß ist der Umfang eines Quadrats mit 6 cm Seitenlänge?', a: ['12 cm', '24 cm', '36 cm', '18 cm'], correct: 1,
                  why: 'Ein Quadrat hat vier gleich lange Seiten: 4 × 6 cm = 24 cm. 36 cm² wäre die Fläche.' },
                { q: 'Was ist 0,25 als Bruch?', a: ['1/2', '1/3', '1/4', '2/5'], correct: 2,
                  why: '0,25 sind 25 Hundertstel. Kürze mit 25 und du erhältst 1/4.' }
            ],
            deutsch: [
                { q: 'Welcher Fall ist „dem Kind"?', a: ['Nominativ', 'Genitiv', 'Dativ', 'Akkusativ'], correct: 2,
                  why: 'Frage „wem?" – Antwort: dem Kind. Das ist der Dativ.' },
                { q: 'Was ist ein Adjektiv?', a: ['Ein Tunwort', 'Ein Wiewort', 'Ein Namenwort', 'Ein Bindewort'], correct: 1,
                  why: 'Adjektive beschreiben, wie etwas ist: schnell, blau, laut.' },
                { q: 'Welche Zeitform ist „ich hatte gelesen"?', a: ['Präteritum', 'Perfekt', 'Plusquamperfekt', 'Futur'], correct: 2,
                  why: 'Die Vorvergangenheit besteht aus „hatte" plus Partizip – etwas, das noch vor einer anderen Vergangenheit passierte.' }
            ],
            englisch: [
                { q: 'Wie lautet die Vergangenheit von „go"?', a: ['goed', 'went', 'gone', 'going'], correct: 1,
                  why: '„go" ist unregelmäßig: go – went – gone. „gone" braucht immer ein „have" davor.' },
                { q: 'Welcher Satz ist richtig?', a: ['She don\'t like pizza.', 'She doesn\'t likes pizza.', 'She doesn\'t like pizza.', 'She not like pizza.'], correct: 2,
                  why: 'Bei he, she, it heißt es „doesn\'t" – und danach steht das Verb in der Grundform.' },
                { q: 'Was heißt „every day"?', a: ['gestern', 'jeden Tag', 'den ganzen Tag', 'eines Tages'], correct: 1,
                  why: '„every" heißt jeder. „all day" wäre den ganzen Tag.' }
            ],
            wissen: [
                { q: 'Wie heißt der Vorgang, mit dem Pflanzen Zucker herstellen?', a: ['Verdauung', 'Photosynthese', 'Verdunstung', 'Atmung'], correct: 1,
                  why: 'Mit Licht, Wasser und Kohlenstoffdioxid bauen Pflanzen Zucker – und geben dabei Sauerstoff ab.' },
                { q: 'Welches Organ pumpt das Blut?', a: ['Lunge', 'Leber', 'Herz', 'Magen'], correct: 2,
                  why: 'Das Herz ist ein Muskel und pumpt das Blut durch den ganzen Körper.' },
                { q: 'Was ist der größte Ozean der Erde?', a: ['Atlantik', 'Indischer Ozean', 'Pazifik', 'Arktischer Ozean'], correct: 2,
                  why: 'Der Pazifik ist größer als alle Landflächen der Erde zusammen.' }
            ]
        },

        '7-8': {
            mathe: [
                { q: 'Löse: 3x + 6 = 21', a: ['x = 3', 'x = 5', 'x = 7', 'x = 9'], correct: 1,
                  why: 'Erst 6 auf beiden Seiten abziehen: 3x = 15. Dann durch 3 teilen: x = 5.' },
                { q: 'Wie viel sind 15 % von 240?', a: ['24', '30', '36', '48'], correct: 2,
                  why: '10 % sind 24, 5 % sind die Hälfte davon, also 12. Zusammen 36.' },
                { q: 'Wie lautet der Satz des Pythagoras?', a: ['a + b = c', 'a² + b² = c²', 'a × b = c', 'a² − b² = c²'], correct: 1,
                  why: 'Im rechtwinkligen Dreieck sind die Quadrate der beiden Katheten zusammen so groß wie das Quadrat der Hypotenuse.' }
            ],
            deutsch: [
                { q: 'Was ist ein Konjunktiv?', a: ['Eine Zeitform', 'Eine Möglichkeitsform', 'Ein Satzglied', 'Eine Wortart'], correct: 1,
                  why: 'Der Konjunktiv drückt aus, was möglich oder gewünscht wäre: „Ich hätte gern …"' },
                { q: 'Welches Satzglied ist „im Garten" in „Wir spielen im Garten"?', a: ['Subjekt', 'Objekt', 'Adverbiale Bestimmung', 'Prädikat'], correct: 2,
                  why: 'Es antwortet auf „wo?" – eine adverbiale Bestimmung des Ortes.' },
                { q: 'Was kennzeichnet eine Metapher?', a: ['Ein wörtlicher Vergleich mit „wie"', 'Eine bildhafte Übertragung', 'Eine Übertreibung', 'Eine Lautmalerei'], correct: 1,
                  why: 'Bei der Metapher fehlt das „wie". „Er ist ein Löwe" – nicht „wie ein Löwe".' }
            ],
            englisch: [
                { q: 'Welcher Satz steht im Present Perfect?', a: ['I went to London.', 'I have been to London.', 'I go to London.', 'I was in London.'], correct: 1,
                  why: 'Present Perfect ist „have/has" plus Partizip – für Dinge mit Bezug zur Gegenwart.' },
                { q: 'Was ist die Passivform von „They build a house"?', a: ['A house is built.', 'A house builds.', 'A house is building.', 'A house was build.'], correct: 0,
                  why: 'Passiv ist eine Form von „be" plus Partizip: is built.' },
                { q: 'Was bedeutet „to give up"?', a: ['aufgeben', 'weitermachen', 'hochheben', 'verschenken'], correct: 0,
                  why: 'Ein Phrasal Verb: „give up" heißt aufgeben, nicht „hochgeben".' }
            ],
            wissen: [
                { q: 'Was beschreibt das Ohmsche Gesetz?', a: ['Kraft und Masse', 'Spannung, Strom und Widerstand', 'Energie und Zeit', 'Druck und Volumen'], correct: 1,
                  why: 'U = R × I. Die Spannung ergibt sich aus Widerstand mal Stromstärke.' },
                { q: 'Was passiert bei einer chemischen Reaktion?', a: ['Stoffe ändern nur die Form', 'Neue Stoffe entstehen', 'Nur die Temperatur ändert sich', 'Nichts verändert sich'], correct: 1,
                  why: 'Bei einer chemischen Reaktion werden Bindungen neu geknüpft – es entstehen andere Stoffe.' },
                { q: 'In welchem Jahr fiel die Berliner Mauer?', a: ['1987', '1989', '1990', '1991'], correct: 1,
                  why: 'Am 9. November 1989. Die Wiedervereinigung folgte knapp ein Jahr später, 1990.' }
            ]
        }
    }
};
