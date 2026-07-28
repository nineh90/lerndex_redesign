<?php
require_once __DIR__ . '/../site.php';

/**
 * Wechsel zwischen Eltern- und Kinderansprache.
 *
 * Bewusst NICHT im Hero: dort standen zwei gleichrangige Reiter mit denselben
 * Labels wie die ersten beiden Navbar-Links, die aber zu echten Seiten fuehren.
 * Hier steht stattdessen pro Modus genau ein Button, der sagt, was er tut –
 * und darueber der Satz, warum es ihn gibt.
 *
 * Die Buttons tragen kein aria-pressed: es sind Aktionen ("schalte um"),
 * keine Zustandsschalter. script.js setzt den Zustand nur dort, wo das
 * Attribut vorhanden ist.
 */
?>
<section class="section audience-invite" id="ansicht-wechseln">
    <div class="container">
        <div class="invite-card reveal">

            <div class="invite-avatar" aria-hidden="true">
                <picture>
                    <source srcset="/assets/images/logo/lexi-144.webp" type="image/webp">
                    <img src="/assets/images/logo/lexi-144.png" alt=""
                         width="98" height="144" loading="lazy" decoding="async">
                </picture>
            </div>

            <div class="invite-text">
                <h2 class="for-parents">Ihr Kind liest mit?</h2>
                <p class="for-parents">
                    Dann lassen Sie es weiterlesen. Lerndex erzählt diese Seite auch in
                    Kindersprache – Lexi übernimmt, alles in Du-Form, kein Wort über Abos.
                    Sie können jederzeit zurückschalten.
                </p>

                <h2 class="for-kids">Du liest die Kinderansicht</h2>
                <p class="for-kids">
                    Lexi erklärt dir hier alles in deiner Sprache. Wenn deine Eltern
                    nachlesen wollen, wie das mit Sicherheit, Daten und Preisen läuft –
                    hier ist ihr Weg.
                </p>
            </div>

            <div class="invite-action">
                <button type="button" class="btn btn-primary btn-lg for-parents" data-audience="kids">
                    <?php icon('sparkles'); ?> Kinderansicht einschalten
                </button>
                <button type="button" class="btn btn-secondary btn-lg for-kids" data-audience="parents">
                    <?php icon('users'); ?> Zurück zur Elternansicht
                </button>
            </div>

        </div>
    </div>
</section>
