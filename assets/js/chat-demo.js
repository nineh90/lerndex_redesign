/* ═══════════════════════════════════════════════════════════════
   LEXI-CHAT-DEMO

   Laesst das Gespraech aus includes/sections/demo_chat.php ablaufen,
   als wuerde es gerade geschrieben.

   Grundregel wie ueberall auf der Seite: der sichtbare Zustand ist der
   Startzustand. Das Markup enthaelt den vollstaendigen Verlauf – erst
   dieses Skript blendet ihn aus und laesst ihn wieder auflaufen. Ohne
   JavaScript, bei prefers-reduced-motion oder wenn hier etwas schiefgeht,
   steht das Gespraech einfach komplett da.

   Vor Lexis Nachrichten laeuft ein Tippindikator, vor den Nachrichten des
   Kindes nicht – das erzeugt den Rhythmus eines echten Chats, ohne dass
   Text Buchstabe fuer Buchstabe entsteht (was bei langen deutschen Saetzen
   zaeh wirkt und Screenreader durcheinanderbringt).
   ═══════════════════════════════════════════════════════════════ */
(function () {
    'use strict';

    var log = document.getElementById('demo-chat');
    if (!log) { return; }

    var replay = document.getElementById('demo-chat-replay');
    var msgs   = Array.prototype.slice.call(log.querySelectorAll('.chat-msg'));
    if (!msgs.length) { return; }

    var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (reduce) { return; }          // alles bleibt sichtbar, kein Ablauf

    /* Wartezeit vor einer Nachricht. Laengere Antworten brauchen laenger,
       aber nach oben begrenzt – niemand schaut drei Sekunden auf drei Punkte. */
    function delayFor(msg) {
        var len = (msg.textContent || '').trim().length;
        return Math.min(400 + len * 14, 1600);
    }

    var typing = document.createElement('li');
    typing.className = 'chat-msg chat-msg--lexi chat-typing';
    typing.setAttribute('aria-hidden', 'true');
    typing.innerHTML = '<span class="chat-bubble"><span></span><span></span><span></span></span>';

    var timers  = [];
    var running = false;

    function clearTimers() {
        timers.forEach(clearTimeout);
        timers = [];
    }

    function later(fn, ms) {
        timers.push(setTimeout(fn, ms));
    }

    function hideTyping() {
        if (typing.parentNode) { typing.parentNode.removeChild(typing); }
    }

    function step(i) {
        if (i >= msgs.length) {
            running = false;
            hideTyping();
            if (replay) { replay.hidden = false; }
            return;
        }

        var msg   = msgs[i];
        var isBot = msg.classList.contains('chat-msg--lexi');

        function show() {
            hideTyping();
            msg.hidden = false;
            msg.classList.add('is-in');
            later(function () { step(i + 1); }, isBot ? 550 : 700);
        }

        if (isBot) {
            log.appendChild(typing);
            later(show, delayFor(msg));
        } else {
            later(show, 320);
        }
    }

    function clear() {
        msgs.forEach(function (m) {
            m.hidden = true;
            m.classList.remove('is-in');   // damit der Einflug beim Wiederholen erneut laeuft
        });
    }

    function start() {
        if (running) { return; }
        running = true;

        clearTimers();
        hideTyping();
        clear();
        if (replay) { replay.hidden = true; }

        later(function () { step(0); }, 400);
    }

    if (replay) { replay.addEventListener('click', start); }

    /* Ohne IntersectionObserver gibt es keinen Ablauf – dann bleibt der
       Verlauf vollstaendig stehen, so wie er im Markup steht. */
    if (!('IntersectionObserver' in window)) { return; }

    /* Zuerst die Endhoehe festhalten, dann ausblenden – in dieser Reihenfolge,
       sonst ist nichts mehr zu messen. Der Kasten steht damit von Anfang an
       in seiner vollen Groesse da und waechst waehrend des Ablaufs nicht.
       Ausgeblendet wird sofort und nicht erst beim Hereinscrollen: sonst liest
       man beim Herunterscrollen das ganze Gespraech und es wird einem vor der
       Nase weggewischt, um von vorn zu beginnen. */
    log.style.minHeight = log.offsetHeight + 'px';
    clear();

    var io = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                io.disconnect();
                start();
            }
        });
    }, { threshold: 0.35 });

    io.observe(log);
})();
