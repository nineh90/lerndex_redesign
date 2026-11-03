/**
 * Kinderseite (/fuer-kinder): Lexi zum Antippen, XP-Spiel, Sammelkarten,
 * Teilen-Knopf und Konfetti.
 *
 * Alles hier ist Zugabe. Ohne JavaScript steht der komplette Text im HTML,
 * das XP-Spiel zeigt eine ruhige Anzeige, und der Teilen-Knopf ist ein
 * normaler mailto-Link.
 */
(function () {
    'use strict';

    var ruhig = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    // ── Konfetti ──────────────────────────────────────────────
    var FARBEN = ['var(--game-yellow)', 'var(--game-pink)', 'var(--game-cyan)', 'var(--game-lime)', 'var(--game-orange)', 'var(--brand-400)'];

    function konfetti(anzahl) {
        if (ruhig) return;
        var box = document.createElement('div');
        box.className = 'konfetti';
        box.setAttribute('aria-hidden', 'true');
        for (var i = 0; i < anzahl; i++) {
            var t = document.createElement('i');
            t.style.setProperty('--x', Math.random() * 100 + '%');
            t.style.setProperty('--b', (8 + Math.random() * 8) + 'px');
            t.style.setProperty('--f', FARBEN[i % FARBEN.length]);
            t.style.setProperty('--z', (1.6 + Math.random() * 1.6) + 's');
            t.style.setProperty('--dx', (Math.random() * 200 - 100) + 'px');
            t.style.setProperty('--r', (Math.random() * 1080 - 540) + 'deg');
            t.style.animationDelay = (Math.random() * 0.4) + 's';
            box.appendChild(t);
        }
        document.body.appendChild(box);
        setTimeout(function () { box.remove(); }, 4000);
    }

    // ── Hero: Lexi spricht ────────────────────────────────────
    var hero = document.querySelector('.kids-hero');
    var lexi = document.querySelector('[data-lexi]');
    var text = document.querySelector('[data-lexi-text]');
    var blase = text && text.closest('.kids-bubble');

    if (hero) {
        requestAnimationFrame(function () { hero.classList.add('ist-bereit'); });
    }

    if (lexi && text) {
        var sprueche = [];
        try { sprueche = JSON.parse(lexi.dataset.sprueche || '[]'); } catch (e) { /* leer lassen */ }
        var naechster = 0;
        var tippTimer = null;

        var tippe = function (satz) {
            clearInterval(tippTimer);
            if (ruhig) { text.textContent = satz; return; }
            var i = 0;
            text.textContent = '';
            blase.classList.add('tippt');
            tippTimer = setInterval(function () {
                i++;
                text.textContent = satz.slice(0, i);
                if (i >= satz.length) {
                    clearInterval(tippTimer);
                    blase.classList.remove('tippt');
                }
            }, 28);
        };

        var hinweis = document.querySelector('[data-tipp-hinweis]');
        var hinweisText = document.querySelector('[data-tipp-text]');
        var stage = lexi.closest('.kids-stage');

        // Solange niemand getippt hat, wackelt Lexi alle paar Sekunden –
        // wie eine Spielfigur, die auf einen wartet.
        if (stage && !ruhig) stage.classList.add('wartet');

        lexi.addEventListener('click', function () {
            if (!sprueche.length) return;
            tippe(sprueche[naechster % sprueche.length]);
            naechster++;

            lexi.classList.remove('hopst');
            void lexi.offsetWidth;          // Animation neu starten
            lexi.classList.add('hopst');
            if (stage) stage.classList.remove('wartet');

            // Zaehler: zeigt, dass noch mehr kommt – und spornt an
            if (hinweisText) {
                var gesehen = Math.min(naechster, sprueche.length);
                hinweisText.textContent = gesehen < sprueche.length
                    ? 'Nochmal! ' + gesehen + '/' + sprueche.length
                    : 'Alle entdeckt! 🎉';
                hinweis.classList.add('gezaehlt');
            }

            if (naechster === sprueche.length) {
                konfetti(120);              // alle Sprueche gefunden
            } else if (naechster % 3 === 0) {
                konfetti(30);               // kleine Belohnung zwischendurch
            }
        });

        // Begruessung einmal abtippen, damit man sieht: hier passiert was
        if (!ruhig) {
            setTimeout(function () { tippe(text.textContent); }, 500);
        }
    }

    // ── XP-Spiel ──────────────────────────────────────────────
    // Gleiche Regeln wie die App (xp_service.dart): XP fuer ein Level =
    // 50 + 10·L + 1,5·L², auf Zehner gerundet. 50 Level, fuenf Raenge.
    var spiel = document.querySelector('[data-xp-spiel]');

    if (spiel) {
        var RAENGE = [
            { bis: 10, emoji: '📚', name: 'Lernling' },
            { bis: 20, emoji: '🔍', name: 'Entdecker' },
            { bis: 30, emoji: '🔬', name: 'Forscher' },
            { bis: 40, emoji: '🎓', name: 'Experte' },
            { bis: 50, emoji: '🏆', name: 'Meister' }
        ];
        var MAX_LEVEL = 50;

        var xpFuerLevel = function (l) {
            var roh = 50 + 10 * l + Math.floor(l * l * 1.5);
            return Math.round(roh / 10) * 10;
        };
        var rangFuer = function (l) {
            for (var i = 0; i < RAENGE.length; i++) if (l <= RAENGE[i].bis) return i;
            return RAENGE.length - 1;
        };

        var stand = { level: 1, xp: 40 };

        var el = {
            level:  spiel.querySelector('[data-xp-level]'),
            levelBox: spiel.querySelector('.xp-level'),
            rang:   spiel.querySelector('[data-xp-rang]'),
            emoji:  spiel.querySelector('[data-xp-rang-emoji]'),
            balken: spiel.querySelector('[data-xp-balken]'),
            fuell:  spiel.querySelector('[data-xp-fuellung]'),
            ist:    spiel.querySelector('[data-xp-ist]'),
            ziel:   spiel.querySelector('[data-xp-ziel]'),
            meld:   spiel.querySelector('[data-xp-meldung]'),
            knoepfe: spiel.querySelector('[data-xp-knoepfe]')
        };
        var leiter = document.querySelectorAll('.rang');

        var zeige = function () {
            var ziel = xpFuerLevel(stand.level);
            var r = rangFuer(stand.level);
            el.level.textContent = stand.level;
            el.rang.textContent = RAENGE[r].name;
            el.emoji.textContent = RAENGE[r].emoji;
            el.ist.textContent = stand.level >= MAX_LEVEL ? ziel : stand.xp;
            el.ziel.textContent = ziel;
            el.fuell.style.width = (stand.level >= MAX_LEVEL ? 100 : Math.min(100, stand.xp / ziel * 100)) + '%';
            el.balken.setAttribute('aria-valuemax', ziel);
            el.balken.setAttribute('aria-valuenow', Math.min(stand.xp, ziel));
            leiter.forEach(function (li, i) { li.classList.toggle('ist-aktiv', i === r); });
        };

        var melde = function (satz) {
            el.meld.textContent = satz;
            el.meld.classList.remove('neu');
            void el.meld.offsetWidth;
            el.meld.classList.add('neu');
        };

        var dazu = function (plus) {
            if (stand.level >= MAX_LEVEL) {
                melde('🏆 Level 50 – Meister! Mehr geht nicht.');
                return;
            }
            var rangVorher = rangFuer(stand.level);
            var aufgestiegen = 0;
            stand.xp += plus;

            while (stand.level < MAX_LEVEL && stand.xp >= xpFuerLevel(stand.level)) {
                stand.xp -= xpFuerLevel(stand.level);
                stand.level++;
                aufgestiegen++;
            }
            if (stand.level >= MAX_LEVEL) stand.xp = 0;

            zeige();

            if (aufgestiegen) {
                el.levelBox.classList.remove('levelup');
                void el.levelBox.offsetWidth;
                el.levelBox.classList.add('levelup');

                var rangJetzt = rangFuer(stand.level);
                if (rangJetzt !== rangVorher) {
                    melde('Neuer Rang: ' + RAENGE[rangJetzt].emoji + ' ' + RAENGE[rangJetzt].name + '!');
                    konfetti(120);
                } else {
                    melde('⭐ Level ' + stand.level + '! Weiter so!');
                    konfetti(60);
                }
            } else {
                melde('+' + plus + ' XP – noch ' + (xpFuerLevel(stand.level) - stand.xp) + ' bis Level ' + (stand.level + 1));
            }
        };

        el.knoepfe.hidden = false;
        el.knoepfe.addEventListener('click', function (e) {
            var knopf = e.target.closest('[data-xp-plus]');
            if (knopf) dazu(parseInt(knopf.dataset.xpPlus, 10));
        });

        zeige();
    }

    // ── Sammelkarten: neigen und glänzen ──────────────────────
    var karten = document.querySelectorAll('[data-karte]');
    var feinZeiger = window.matchMedia && window.matchMedia('(hover: hover) and (pointer: fine)').matches;

    karten.forEach(function (karte) {
        if (feinZeiger && !ruhig) {
            karte.addEventListener('pointermove', function (e) {
                var r = karte.getBoundingClientRect();
                var x = (e.clientX - r.left) / r.width;
                var y = (e.clientY - r.top) / r.height;
                karte.style.setProperty('--mx', (x * 100) + '%');
                karte.style.setProperty('--my', (y * 100) + '%');
                karte.style.setProperty('--ry', ((x - 0.5) * 16) + 'deg');
                karte.style.setProperty('--rx', ((0.5 - y) * 16) + 'deg');
            });
            karte.addEventListener('pointerleave', function () {
                karte.style.setProperty('--rx', '0deg');
                karte.style.setProperty('--ry', '0deg');
            });
        }
        // Auf dem Handy: antippen zeigt den Glanz
        karte.addEventListener('click', function () {
            karten.forEach(function (k) { if (k !== karte) k.classList.remove('ist-aktiv'); });
            karte.classList.toggle('ist-aktiv');
        });
    });

    // ── An die Eltern schicken ────────────────────────────────
    document.querySelectorAll('[data-teilen]').forEach(function (link) {
        if (!navigator.share) return;      // dann bleibt der mailto-Link
        link.addEventListener('click', function (e) {
            e.preventDefault();
            navigator.share({
                title: 'Lerndex',
                text: link.dataset.teilenText,
                url: link.dataset.teilenUrl
            }).catch(function () { /* abgebrochen – nichts tun */ });
        });
    });

    // ── Quiz-Demo: Konfetti bei voller Punktzahl ──────────────
    var ergebnis = document.querySelector('[data-quiz="result"]');
    if (ergebnis && window.MutationObserver) {
        var gefeiert = false;
        new MutationObserver(function () {
            if (ergebnis.hidden) { gefeiert = false; return; }
            if (!gefeiert && /Alles richtig/.test(ergebnis.textContent)) {
                gefeiert = true;
                konfetti(140);
            }
        }).observe(ergebnis, { childList: true, attributes: true, attributeFilter: ['hidden'] });
    }
})();
