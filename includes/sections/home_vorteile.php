<?php
require_once __DIR__ . '/../site.php';

/**
 * Vorteile als Bento-Raster: eine grosse Kachel mit dem Kernversprechen,
 * darum herum fünf kleinere. Jede Aussage ist eine belegte Funktion:
 *   Sokrates-Prinzip, Gesprächsverlauf mit Warnhinweisen (Eltern-Dashboard),
 *   XP/Level/Streak/Belohnungen, aktive Lernzeit, Foto → Übung mit Freigabe,
 *   werbefrei/DSGVO.
 * Das Beispielgespräch in der grossen Kachel zeigt die Methode, kein Zitat
 * aus einem echten Verlauf.
 */
?>
<section class="section vorteile" aria-labelledby="vorteile-titel">
    <div class="container">
        <div class="section-header">
            <span class="badge">Warum Lerndex</span>
            <h2 id="vorteile-titel">Lernen, das sich gut anfühlt – <span class="text-gradient">für Kind und Eltern</span></h2>
            <p>Lerndex verbindet geduldige Erklärungen mit echter Motivation. Und Sie behalten
               dabei immer den Überblick.</p>
        </div>

        <div class="bento reveal-stagger">

            <article class="bento-kachel bento-kachel--gross">
                <div class="bento-text">
                    <span class="bento-marke">Das Herzstück</span>
                    <h3>Lexi erklärt, statt vorzusagen</h3>
                    <p>Statt die Lösung hinzuschreiben, stellt Lexi die richtigen Rückfragen. So findet
                       Ihr Kind den Weg selbst – und kann die nächste Aufgabe allein.</p>
                </div>
                <div class="bento-gespraech" aria-label="Beispiel, wie Lexi antwortet">
                    <p class="blase blase--kind">Was ist 7 · 8? Sag's mir einfach!</p>
                    <p class="blase blase--lexi">Fast geschafft! 😊 Was ist denn 7 · 7 – und wie viel fehlt dann noch?</p>
                    <p class="blase blase--kind">49 … plus 7 … 56!</p>
                    <p class="blase blase--lexi">Genau! Und das hast du ganz allein gerechnet. ⭐</p>
                </div>
                <img class="bento-lexi" src="/assets/images/lexi/lexi-zauberer-240.webp"
                     srcset="/assets/images/lexi/lexi-zauberer-240.webp 240w, /assets/images/lexi/lexi-zauberer-436.webp 436w"
                     sizes="160px" width="436" height="512" alt="" loading="lazy" decoding="async">
            </article>

            <article class="bento-kachel bento-kachel--lila">
                <span class="bento-icon" aria-hidden="true">👀</span>
                <h3>Sie lesen jedes Gespräch mit</h3>
                <p>Alle Chats mit Lexi bleiben im Eltern-Dashboard einsehbar. Auffälliges wird
                   automatisch markiert – Sie müssen nicht suchen.</p>
            </article>

            <article class="bento-kachel bento-kachel--pfirsich">
                <span class="bento-icon" aria-hidden="true">🏆</span>
                <h3>Motivation, die wirkt</h3>
                <p>XP, 50 Level, Sterne und eine Lern-Streak. Und Sie legen echte Belohnungen fest,
                   die Ihr Kind sich erarbeitet.</p>
            </article>

            <article class="bento-kachel bento-kachel--tuerkis">
                <span class="bento-icon" aria-hidden="true">⏱️</span>
                <h3>Echte Lernzeit</h3>
                <p>Gezählt wird nur aktives Lernen. Eine offene App im Hintergrund erzeugt keine Minuten.</p>
            </article>

            <article class="bento-kachel">
                <span class="bento-icon" aria-hidden="true">📸</span>
                <h3>Hausaufgabe wird Übung</h3>
                <p>Fotografieren Sie ein Arbeitsblatt – Lerndex macht passende Übungen daraus.
                   Ihr Kind sieht sie erst, wenn Sie sie freigeben.</p>
            </article>

            <article class="bento-kachel">
                <span class="bento-icon" aria-hidden="true">🛡️</span>
                <h3>Werbefrei und DSGVO-konform</h3>
                <p>Keine Werbung, kein Verkauf von Daten. Der Elternbereich ist mit einer PIN geschützt.</p>
            </article>

        </div>
    </div>
</section>
