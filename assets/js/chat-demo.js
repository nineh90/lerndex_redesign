/* ═══════════════════════════════════════════════════════════════
   LEXI-CHAT-DEMO

   Laesst eines der Gespraeche aus includes/sections/demo_chat.php
   ablaufen, als wuerde es gerade geschrieben – inklusive XP-Banner,
   das dabei hochzaehlt.

   Grundregel wie ueberall auf der Seite: der sichtbare Zustand ist der
   Startzustand. Das Markup enthaelt alle vier Gespraeche vollstaendig –
   erst dieses Skript waehlt eines aus, blendet den Rest aus und laesst
   das gewaehlte auflaufen. Ohne JavaScript stehen alle Gespraeche
   untereinander da, jedes mit seinem Fach-Trenner davor.

   Welches Fach zu sehen ist, entscheidet der Zufall beim Laden. Wer die
   Startseite zweimal besucht, bekommt ein anderes Gespraech – und ueber
   die Chips kommt man ohnehin an jedes.

   Vor Lexis Nachrichten laeuft ein Denkindikator, vor den Nachrichten des
   Kindes nicht – das erzeugt den Rhythmus eines echten Chats, ohne dass
   Text Buchstabe fuer Buchstabe entsteht (was bei langen deutschen Saetzen
   zaeh wirkt und Screenreader durcheinanderbringt).
   ═══════════════════════════════════════════════════════════════ */
(function () {
    'use strict';

    var stage = document.getElementById('demo-chat');
    if (!stage) { return; }

    var logs = Array.prototype.slice.call(stage.querySelectorAll('.chat-log'));
    if (!logs.length) { return; }

    var picker  = document.getElementById('demo-chat-picker');
    var replay  = document.getElementById('demo-chat-replay');
    var typing  = document.getElementById('demo-chat-typing');
    var xpBar   = document.getElementById('demo-chat-xp');
    var xpPop   = document.getElementById('demo-chat-xp-pop');
    var chips   = picker
        ? Array.prototype.slice.call(picker.querySelectorAll('.chip'))
        : [];

    var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* ── XP-Banner ────────────────────────────────────────────────
       Die Texte stehen als Vorlage mit {n} im Markup, damit Sprache
       und Zahlen (2 XP pro Nachricht, 50 pro Tag) an einer Stelle
       liegen – naemlich dort, wo sie gegen die App geprueft werden. */
    var xp = (function () {
        if (!xpBar) { return null; }

        var left  = xpBar.querySelector('.chat-xpbar-left');
        var count = xpBar.querySelector('.chat-xpbar-count');
        var fill  = xpBar.querySelector('.chat-xpbar-fill');
        if (!left || !count || !fill) { return null; }

        var step      = parseInt(xpBar.getAttribute('data-xp-step'), 10) || 0;
        var max       = parseInt(xpBar.getAttribute('data-xp-max'), 10) || 0;
        var leftTpl   = xpBar.getAttribute('data-xp-left') || '';
        var countTpl  = xpBar.getAttribute('data-xp-count') || '';

        function render(earned) {
            var remaining = Math.max(max - earned, 0);
            left.textContent  = leftTpl.replace('{n}', remaining);
            count.textContent = countTpl.replace('{n}', earned);
            fill.style.width  = (max ? (earned / max) * 100 : 0) + '%';
        }

        return {
            step: step,
            set: render
        };
    })();

    var earned = 0;

    /* Die +XP-Blase steigt auf und verblasst. Die Animation steckt im CSS
       und startet beim Einblenden neu – dafuer muss das Element kurz aus
       dem Layout raus, sonst laeuft sie beim zweiten Mal nicht wieder an. */
    function popXp() {
        if (!xpPop) { return; }
        xpPop.hidden = true;
        void xpPop.offsetWidth;
        xpPop.hidden = false;
        later(function () { xpPop.hidden = true; }, 1200);
    }

    /* ── Ablauf ───────────────────────────────────────────────────*/
    var timers  = [];
    var running = false;
    var current = null;          // das gerade sichtbare <ol>
    var io      = null;          // Beobachter, der den Ablauf ausloest

    function clearTimers() {
        timers.forEach(clearTimeout);
        timers = [];
    }

    function later(fn, ms) {
        timers.push(setTimeout(fn, ms));
    }

    function msgsOf(log) {
        return Array.prototype.slice.call(log.querySelectorAll('.chat-msg'));
    }

    function hideTyping() {
        if (typing) { typing.hidden = true; }
    }

    /* Wartezeit vor einer Nachricht. Laengere Antworten brauchen laenger,
       aber nach oben begrenzt – niemand schaut drei Sekunden auf einen
       drehenden Kreis. */
    function delayFor(msg) {
        var len = (msg.textContent || '').trim().length;
        return Math.min(400 + len * 12, 1700);
    }

    function step(msgs, i) {
        if (i >= msgs.length) {
            running = false;
            hideTyping();
            /* Ab jetzt traegt der Inhalt die Hoehe wieder selbst. Wichtig
               fuer den Fall, dass zwischendurch jemand das Fenster
               schmaler zieht: der reservierte Wert waere dann zu klein. */
            stage.style.minHeight = '';
            if (replay) { replay.hidden = false; }
            return;
        }

        var msg   = msgs[i];
        var isBot = msg.classList.contains('chat-msg--lexi');

        function show() {
            hideTyping();
            msg.hidden = false;
            msg.classList.add('is-in');

            /* XP gibt es in der App pro Nachricht – hier also genau dann,
               wenn Lexi geantwortet hat. */
            if (isBot && xp) {
                earned += xp.step;
                xp.set(earned);
                popXp();
            }

            later(function () { step(msgs, i + 1); }, isBot ? 550 : 700);
        }

        if (isBot) {
            if (typing) {
                msg.parentNode.appendChild(typing);
                typing.hidden = false;
            }
            later(show, delayFor(msg));
        } else {
            later(show, 320);
        }
    }

    function start() {
        if (!current) { return; }
        running = true;

        clearTimers();
        hideTyping();
        if (xpPop) { xpPop.hidden = true; }
        if (replay) { replay.hidden = true; }

        earned = 0;
        if (xp) { xp.set(0); }

        /* Endhoehe dieses Gespraechs reservieren, bevor die Nachrichten
           verschwinden – sonst klappt der Kasten zusammen und der Rest der
           Seite rutscht waehrend des Ablaufs nach oben. */
        reserve(current);

        var msgs = msgsOf(current);
        msgs.forEach(function (m) {
            m.hidden = true;
            m.classList.remove('is-in');   // damit der Einflug erneut laeuft
        });

        later(function () { step(msgs, 0); }, 400);
    }

    /* Zeigt ein Gespraech. Ohne Ablauf steht es sofort vollstaendig da,
       das Banner dann auf seinem Endstand – so wie nach dem Gespraech. */
    function select(key, animate) {
        clearTimers();
        running = false;
        hideTyping();
        if (xpPop) { xpPop.hidden = true; }

        logs.forEach(function (log) {
            var active = log.getAttribute('data-chat') === key;
            log.hidden = !active;
            if (active) { current = log; }
        });

        chips.forEach(function (chip) {
            var active = chip.getAttribute('data-chat') === key;
            chip.classList.toggle('is-active', active);
            chip.setAttribute('aria-pressed', active ? 'true' : 'false');
        });

        if (!current) { return; }

        if (animate) {
            start();
            return;
        }

        stage.style.minHeight = '';

        var msgs = msgsOf(current);
        msgs.forEach(function (m) {
            m.hidden = false;
            m.classList.remove('is-in');
        });
        if (replay) { replay.hidden = true; }
        if (xp) {
            earned = msgs.filter(function (m) {
                return m.classList.contains('chat-msg--lexi');
            }).length * xp.step;
            xp.set(earned);
        }
    }

    /* ── Aufbau ───────────────────────────────────────────────────
       Zuerst die Endhoehe jedes Gespraechs festhalten, dann umschalten –
       in dieser Reihenfolge, sonst ist nichts mehr zu messen. Gemessen
       wird jedes Gespraech einzeln: eine gemeinsame Hoehe fuer alle vier
       liesse unter den kurzen eine grosse leere Flaeche stehen. */
    var heights = {};
    logs.forEach(function (log) {
        heights[log.getAttribute('data-chat')] = log.offsetHeight;
    });

    function reserve(log) {
        var h = heights[log.getAttribute('data-chat')];
        if (h) { stage.style.minHeight = h + 'px'; }
    }

    if (picker) { picker.hidden = false; }

    /* Sobald jemand selbst ein Fach waehlt oder wiederholt, hat der
       Beobachter nichts mehr zu tun – sonst startet er das Gespraech
       spaeter ein zweites Mal neu. */
    function stopObserving() {
        if (io) { io.disconnect(); io = null; }
    }

    chips.forEach(function (chip) {
        chip.addEventListener('click', function () {
            stopObserving();
            select(chip.getAttribute('data-chat'), !reduce);
        });
    });

    if (replay) {
        replay.addEventListener('click', function () {
            stopObserving();
            if (!running) { select(current.getAttribute('data-chat'), true); }
        });
    }

    /* Zufaelliges Fach beim Laden. */
    var pick = logs[Math.floor(Math.random() * logs.length)];
    select(pick.getAttribute('data-chat'), false);

    /* Bei prefers-reduced-motion bleibt es dabei: ein Gespraech, sofort
       vollstaendig, kein Ablauf. Umschalten geht trotzdem.
       Ohne IntersectionObserver ebenso. */
    if (reduce || !('IntersectionObserver' in window)) { return; }

    /* Ausgeblendet wird sofort und nicht erst beim Hereinscrollen: sonst
       liest man beim Herunterscrollen das ganze Gespraech und es wird
       einem vor der Nase weggewischt, um von vorn zu beginnen. */
    reserve(pick);
    msgsOf(pick).forEach(function (m) { m.hidden = true; });
    if (xp) { earned = 0; xp.set(0); }

    io = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                io.disconnect();
                if (!running) { start(); }
            }
        });
    }, { threshold: 0.35 });

    io.observe(stage);
})();
