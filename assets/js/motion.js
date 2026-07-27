/**
 * Bewegung: Parallax, Karten-Neigung, Fortschrittsleiste.
 *
 * Grundregel für alles hier: bei prefers-reduced-motion wird gar nichts
 * registriert – kein Listener, kein rAF. Die Seite bleibt vollständig
 * benutzbar, sie steht nur still.
 */
(function () {
    'use strict';

    var reduce = window.matchMedia('(prefers-reduced-motion: reduce)');
    if (reduce.matches) return;

    // ─────────────────────────────────────────────
    // Scroll-Parallax
    // Elemente mit data-parallax="0.2" bewegen sich mit 20 % der
    // Scrollgeschwindigkeit. Negative Werte laufen entgegen.
    // ─────────────────────────────────────────────
    var layers = Array.prototype.slice.call(document.querySelectorAll('[data-parallax]'));
    var ticking = false;

    function applyParallax() {
        var vh = window.innerHeight;

        layers.forEach(function (el) {
            var rect = el.getBoundingClientRect();

            // Nur rechnen, was tatsächlich in der Nähe des Viewports ist
            if (rect.bottom < -vh || rect.top > vh * 2) return;

            var speed = parseFloat(el.dataset.parallax) || 0;
            // Abstand der Elementmitte zur Viewportmitte
            var offset = (rect.top + rect.height / 2) - vh / 2;
            el.style.transform = 'translate3d(0, ' + (offset * speed * -1).toFixed(1) + 'px, 0)';
        });

        ticking = false;
    }

    function requestParallax() {
        if (!ticking) {
            ticking = true;
            window.requestAnimationFrame(applyParallax);
        }
    }

    if (layers.length) {
        applyParallax();
        window.addEventListener('scroll', requestParallax, { passive: true });
        window.addEventListener('resize', requestParallax, { passive: true });
    }

    // ─────────────────────────────────────────────
    // Zeiger-Parallax im Hero
    // Die Geräte kippen leicht in Richtung Mauszeiger. Nur auf Geräten
    // mit echtem Zeiger – auf dem Handy wäre das nur Akkuverbrauch.
    // ─────────────────────────────────────────────
    var hero = document.querySelector('.hero');

    if (hero && window.matchMedia('(hover: hover) and (pointer: fine)').matches) {
        var pointerLayers = hero.querySelectorAll('[data-pointer]');

        hero.addEventListener('pointermove', function (e) {
            var rect = hero.getBoundingClientRect();
            var x = (e.clientX - rect.left) / rect.width - 0.5;   // -0.5 … 0.5
            var y = (e.clientY - rect.top) / rect.height - 0.5;

            pointerLayers.forEach(function (el) {
                var depth = parseFloat(el.dataset.pointer) || 0;
                el.style.setProperty('--px', (x * depth * 40).toFixed(1) + 'px');
                el.style.setProperty('--py', (y * depth * 40).toFixed(1) + 'px');
            });
        }, { passive: true });

        hero.addEventListener('pointerleave', function () {
            pointerLayers.forEach(function (el) {
                el.style.setProperty('--px', '0px');
                el.style.setProperty('--py', '0px');
            });
        });
    }

    // ─────────────────────────────────────────────
    // Karten-Neigung
    // ─────────────────────────────────────────────
    if (window.matchMedia('(hover: hover) and (pointer: fine)').matches) {
        document.querySelectorAll('.tilt').forEach(function (card) {
            card.addEventListener('pointermove', function (e) {
                var r = card.getBoundingClientRect();
                var x = (e.clientX - r.left) / r.width - 0.5;
                var y = (e.clientY - r.top) / r.height - 0.5;

                card.style.setProperty('--tilt-x', (y * -8).toFixed(2) + 'deg');
                card.style.setProperty('--tilt-y', (x * 8).toFixed(2) + 'deg');
                // Lichtreflex folgt dem Zeiger
                card.style.setProperty('--glow-x', ((x + 0.5) * 100).toFixed(1) + '%');
                card.style.setProperty('--glow-y', ((y + 0.5) * 100).toFixed(1) + '%');
            }, { passive: true });

            card.addEventListener('pointerleave', function () {
                card.style.setProperty('--tilt-x', '0deg');
                card.style.setProperty('--tilt-y', '0deg');
            });
        });
    }

    // ─────────────────────────────────────────────
    // Lesefortschritt oben am Fensterrand
    // ─────────────────────────────────────────────
    var progress = document.getElementById('scroll-progress');

    if (progress) {
        var progressTicking = false;

        function updateProgress() {
            var max = document.documentElement.scrollHeight - window.innerHeight;
            var pct = max > 0 ? (window.scrollY / max) * 100 : 0;
            progress.style.width = Math.min(pct, 100).toFixed(2) + '%';
            progressTicking = false;
        }

        window.addEventListener('scroll', function () {
            if (!progressTicking) {
                progressTicking = true;
                window.requestAnimationFrame(updateProgress);
            }
        }, { passive: true });

        updateProgress();
    }
})();
