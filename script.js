document.addEventListener('DOMContentLoaded', function () {
  // =========================
  // FAQ Toggle
  // =========================
  var faqItems = document.querySelectorAll('.faq-item');

  faqItems.forEach(function (item) {
    item.addEventListener('click', function () {
      faqItems.forEach(function (otherItem) {
        if (otherItem !== item && otherItem.classList.contains('active')) {
          otherItem.classList.remove('active');
        }
      });

      var isActive = item.classList.contains('active');
      item.classList.toggle('active', !isActive);
    });
  });

  // =========================
  // FAQ Sektions-Toggle
  // =========================
  document.querySelectorAll('.faq-section-header').forEach(function (header) {
    header.addEventListener('click', function () {
      var body = header.nextElementSibling;
      var isOpen = body.classList.contains('open');

      // Alle anderen Sektionen schließen (Akkordeon)
      document.querySelectorAll('.faq-section-body').forEach(function (b) {
        b.classList.remove('open');
      });
      document.querySelectorAll('.faq-section-header').forEach(function (h) {
        h.classList.remove('open');
      });

      // Angeklickte Sektion öffnen (wenn sie vorher zu war)
      if (!isOpen) {
        body.classList.add('open');
        header.classList.add('open');
      }
    });
  });

  // =========================
  // Scroll-Reveal
  // =========================
  // Die Klasse js-anim schaltet die Startzustaende in 02-base.css erst
  // frei, wenn der Observer wirklich existiert. Ohne JS oder bei einem
  // Fehler bleibt der Inhalt sichtbar statt unsichtbar haengen zu bleiben.
  if ('IntersectionObserver' in window) {
    document.documentElement.classList.add('js-anim');

    var revealObserver = new IntersectionObserver(function (entries, obs) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          obs.unobserve(entry.target);
        }
      });
    }, { rootMargin: '0px 0px -8% 0px', threshold: 0.12 });

    // Sections ohne eigene Auszeichnung bekommen das Standard-Reveal
    document.querySelectorAll('.section, .hero').forEach(function (el) {
      if (!el.classList.contains('reveal') && !el.classList.contains('reveal-stagger')) {
        el.classList.add('reveal');
      }
    });

    document.querySelectorAll('.reveal, .reveal-stagger, .bar').forEach(function (el) {
      revealObserver.observe(el);
    });
  }

  // =========================
  // Hochzaehlende Zahlen
  // =========================
  // <span class="count-up" data-to="1500" data-suffix=" XP">0</span>
  var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  document.querySelectorAll('.count-up').forEach(function (el) {
    var target = parseFloat(el.dataset.to || '0');
    var suffix = el.dataset.suffix || '';
    var format = function (v) { return Math.round(v).toLocaleString('de-DE') + suffix; };

    if (reduceMotion || !('IntersectionObserver' in window)) {
      el.textContent = format(target);
      return;
    }

    el.textContent = format(0);

    new IntersectionObserver(function (entries, obs) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) return;
        obs.unobserve(entry.target);

        var start = null;
        var duration = 1400;

        function step(now) {
          if (start === null) start = now;
          var p = Math.min((now - start) / duration, 1);
          // easeOutCubic – schnell anlaufen, sanft ausrollen
          el.textContent = format(target * (1 - Math.pow(1 - p, 3)));
          if (p < 1) requestAnimationFrame(step);
        }

        requestAnimationFrame(step);
      });
    }, { threshold: 0.5 }).observe(el);
  });

  // =========================
  // Eltern/Kinder-Umschalter
  // =========================
  // Der Modus steht bereits am <body> (gesetzt im Inline-Skript in head.php).
  // Hier wird nur noch auf Klicks reagiert und die Wahl gemerkt.
  var audienceButtons = document.querySelectorAll('[data-audience]');

  if (audienceButtons.length) {
    function applyAudience(mode) {
      document.body.classList.toggle('mode-kids', mode === 'kids');
      document.body.classList.toggle('mode-parents', mode !== 'kids');

      audienceButtons.forEach(function (btn) {
        var isCurrent = btn.dataset.audience === mode;
        btn.classList.toggle('is-active', isCurrent);

        // Nur echte Zustandsschalter bekommen aria-pressed. Die Buttons in
        // audience_invite.php sind Aktionen ("schalte um") und tragen es nicht –
        // dort waere "gedrueckt" schlicht die falsche Aussage.
        if (btn.hasAttribute('aria-pressed')) {
          btn.setAttribute('aria-pressed', isCurrent ? 'true' : 'false');
        }
      });

      try { localStorage.setItem('lerndex_audience', mode); } catch (e) {}
    }

    applyAudience(document.body.classList.contains('mode-kids') ? 'kids' : 'parents');

    audienceButtons.forEach(function (btn) {
      btn.addEventListener('click', function () {
        applyAudience(btn.dataset.audience);

        // Der Wechsel tauscht Textmengen ueber der aktuellen Position aus und
        // verschiebt damit den Scrollstand. Den ausloesenden Block wieder
        // in den Blick holen, sonst landet man irgendwo mitten im Dokument.
        var anchor = btn.closest('section');
        if (!anchor) return;

        requestAnimationFrame(function () {
          anchor.scrollIntoView({
            block: 'center',
            behavior: reduceMotion ? 'auto' : 'smooth'
          });
        });
      });
    });
  }

  // =========================
  // Navbar: schmaler Zustand ab dem ersten Scroll
  // =========================
  // Bewusst ein Sentinel statt eines scroll-Listeners: der Observer feuert
  // nur beim Zustandswechsel und laeuft nicht bei jedem Scroll-Tick mit.
  // Ohne IntersectionObserver bleibt die Leiste einfach in ihrem Ruhezustand.
  var navbar = document.querySelector('.navbar');

  if (navbar && 'IntersectionObserver' in window) {
    var navSentinel = document.createElement('div');
    navSentinel.setAttribute('aria-hidden', 'true');
    navSentinel.style.cssText = 'position:absolute;top:0;left:0;width:1px;height:8px;pointer-events:none;';
    document.body.prepend(navSentinel);

    new IntersectionObserver(function (entries) {
      navbar.classList.toggle('is-scrolled', !entries[0].isIntersecting);
    }, { threshold: 0 }).observe(navSentinel);
  }

  // =========================
  // Mobiles Menü – Panel von unten
  // =========================
  var menuToggle = document.getElementById('menu-toggle');
  var mobileMenu = document.getElementById('mobile-menu');
  var menuOverlay = document.getElementById('menu-overlay');
  var menuClose = document.getElementById('menu-close');

  if (menuToggle && mobileMenu && menuOverlay) {
    var lastFocused = null;

    function openMenu() {
      lastFocused = document.activeElement;

      mobileMenu.hidden = false;
      menuOverlay.hidden = false;
      // Reflow erzwingen, damit die Transition greift statt zu springen
      void mobileMenu.offsetWidth;

      mobileMenu.classList.add('is-open');
      menuOverlay.classList.add('is-open');
      menuToggle.classList.add('active');
      menuToggle.setAttribute('aria-expanded', 'true');
      menuToggle.setAttribute('aria-label', 'Menü schließen');
      document.body.classList.add('nav-open');

      var firstLink = mobileMenu.querySelector('a, button');
      if (firstLink) firstLink.focus();
    }

    function closeMenu() {
      mobileMenu.classList.remove('is-open');
      menuOverlay.classList.remove('is-open');
      menuToggle.classList.remove('active');
      menuToggle.setAttribute('aria-expanded', 'false');
      menuToggle.setAttribute('aria-label', 'Menü öffnen');
      document.body.classList.remove('nav-open');

      window.setTimeout(function () {
        if (!mobileMenu.classList.contains('is-open')) {
          mobileMenu.hidden = true;
          menuOverlay.hidden = true;
        }
      }, 350);

      if (lastFocused) lastFocused.focus();
    }

    function isOpen() {
      return mobileMenu.classList.contains('is-open');
    }

    menuToggle.addEventListener('click', function () {
      isOpen() ? closeMenu() : openMenu();
    });

    if (menuClose) menuClose.addEventListener('click', closeMenu);
    menuOverlay.addEventListener('click', closeMenu);

    mobileMenu.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', closeMenu);
    });

    document.addEventListener('keydown', function (e) {
      if (!isOpen()) return;

      if (e.key === 'Escape') {
        closeMenu();
        return;
      }

      // Fokus im geöffneten Dialog halten
      if (e.key === 'Tab') {
        var focusables = mobileMenu.querySelectorAll('a[href], button:not([disabled])');
        if (!focusables.length) return;

        var first = focusables[0];
        var last = focusables[focusables.length - 1];

        if (e.shiftKey && document.activeElement === first) {
          e.preventDefault();
          last.focus();
        } else if (!e.shiftKey && document.activeElement === last) {
          e.preventDefault();
          first.focus();
        }
      }
    });
  }


  // =========================
  // Dashboard-Slider
  // =========================
  if (document.getElementById('slider-track')) {
        const track   = document.getElementById('slider-track');
        const dots    = document.querySelectorAll('.slider-dot');
        const btnPrev = document.getElementById('slider-prev');
        const btnNext = document.getElementById('slider-next');
        const total   = 3;
        let current   = 0;

        function goTo(index) {
            current = (index + total) % total;
            track.style.transform = `translateX(-${current * 100}%)`;
            dots.forEach((d, i) => d.classList.toggle('active', i === current));
        }

        btnPrev.addEventListener('click', () => goTo(current - 1));
        btnNext.addEventListener('click', () => goTo(current + 1));
        dots.forEach(d => d.addEventListener('click', () => goTo(Number(d.dataset.index))));

        // Touch / Swipe
        let startX = 0;
        track.addEventListener('touchstart', e => { startX = e.touches[0].clientX; }, { passive: true });
        track.addEventListener('touchend', e => {
            const diff = startX - e.changedTouches[0].clientX;
            if (Math.abs(diff) > 40) goTo(diff > 0 ? current + 1 : current - 1);
        }, { passive: true });
  }

});
