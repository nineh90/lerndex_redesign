document.addEventListener('DOMContentLoaded', function () {
  // =========================================================
  // 🔥 Firebase Waitlist Endpoint
  // =========================================================
  var WAITLIST_ENDPOINT = "https://europe-west10-lerndex-3775f.cloudfunctions.net/waitlist";

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
        btn.setAttribute('aria-pressed', isCurrent ? 'true' : 'false');
      });

      try { localStorage.setItem('lerndex_audience', mode); } catch (e) {}
    }

    applyAudience(document.body.classList.contains('mode-kids') ? 'kids' : 'parents');

    audienceButtons.forEach(function (btn) {
      btn.addEventListener('click', function () {
        applyAudience(btn.dataset.audience);
      });
    });
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

  // =========================
  // Helper: Status messages
  // =========================
  function setStatus(el, type, msg) {
    if (!el) return;
    el.textContent = msg;
    el.className = 'form-status' + (type ? ' ' + type : '');
  }

  function isValidEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/i.test(String(email).trim());
  }

  // =========================
  // Beta Wizard Form (only if exists)
  // =========================
  var betaForm = document.getElementById('beta-form');
  var formStatus = document.getElementById('form-status');

  if (betaForm) {
    var steps = Array.prototype.slice.call(betaForm.querySelectorAll('.form-step'));
    var currentStep = 1;
    var totalSteps = steps.length;

    var progressCount = document.getElementById('beta-progress-count');
    var progressFill = document.getElementById('beta-progress-fill');

    function showStep(stepNumber, skipFocus) {
      steps.forEach(function (s) { s.classList.remove('is-active'); });

      var active = steps.find(function (s) {
        return Number(s.getAttribute('data-step')) === stepNumber;
      });

      if (active) active.classList.add('is-active');

      // Progress
      var pct = totalSteps ? Math.round((stepNumber / totalSteps) * 100) : 0;
      if (progressFill) progressFill.style.width = pct + '%';
      if (progressCount) progressCount.textContent = stepNumber + '/' + totalSteps;

      // ✅ Focus nur wenn nicht beim ersten Laden (verhindert Auto-Scroll)
      if (!skipFocus && active) {
        var firstField = active.querySelector('input, select, textarea');
        if (firstField) firstField.focus();
      }
    }

    function validateStep(stepNumber) {
      setStatus(formStatus, '', '');

      var stepEl = steps.find(function (s) {
        return Number(s.getAttribute('data-step')) === stepNumber;
      });
      if (!stepEl) return true;

      var requiredFields = Array.prototype.slice.call(stepEl.querySelectorAll('[required]'));

      for (var i = 0; i < requiredFields.length; i++) {
        var field = requiredFields[i];

        if (field.type === 'checkbox') {
          if (!field.checked) {
            setStatus(formStatus, 'error', 'Bitte bestätige die Datenschutzerklärung.');
            field.focus();
            return false;
          }
        } else if (field.tagName === 'SELECT') {
          if (!field.value) {
            setStatus(formStatus, 'error', 'Bitte triff eine Auswahl, um fortzufahren.');
            field.focus();
            return false;
          }
        } else {
          var val = (field.value || '').trim();
          if (!val) {
            setStatus(formStatus, 'error', 'Bitte fülle das Feld aus, um fortzufahren.');
            field.focus();
            return false;
          }
          if (field.type === 'email' && !isValidEmail(val)) {
            setStatus(formStatus, 'error', 'Bitte gib eine gültige E-Mail-Adresse an.');
            field.focus();
            return false;
          }
        }
      }

      return true;
    }

    // init - skipFocus=true verhindert Auto-Scroll beim Laden
    if (steps.length) showStep(currentStep, true);

    // next
    betaForm.querySelectorAll('[data-next]').forEach(function (btn) {
      btn.addEventListener('click', function () {
        if (!validateStep(currentStep)) return;
        if (currentStep < totalSteps) {
          currentStep += 1;
          showStep(currentStep);
        }
      });
    });

    // back
    betaForm.querySelectorAll('[data-back]').forEach(function (btn) {
      btn.addEventListener('click', function () {
        setStatus(formStatus, '', '');
        if (currentStep > 1) {
          currentStep -= 1;
          showStep(currentStep);
        }
      });
    });

    // enter -> next (not last step)
    betaForm.addEventListener('keydown', function (e) {
      if (e.key !== 'Enter') return;

      var activeStep = steps.find(function (s) { return s.classList.contains('is-active'); });
      var activeStepNumber = activeStep ? Number(activeStep.getAttribute('data-step')) : currentStep;
      var isLast = activeStepNumber === totalSteps;

      // allow enter in textarea
      if (e.target && e.target.tagName === 'TEXTAREA') return;

      if (!isLast) {
        e.preventDefault();
        var nextBtn = activeStep ? activeStep.querySelector('[data-next]') : null;
        if (nextBtn) nextBtn.click();
      }
    });

    // submit (🔥 now real backend)
    betaForm.addEventListener('submit', function (e) {
      e.preventDefault();
      if (!validateStep(currentStep)) return;

      if (!WAITLIST_ENDPOINT || WAITLIST_ENDPOINT.indexOf('HIER_DEINE_') === 0) {
        setStatus(formStatus, 'error', 'Backend ist noch nicht verbunden (WAITLIST_ENDPOINT fehlt).');
        return;
      }

      var submitBtn = betaForm.querySelector('button[type="submit"]');
      var original = submitBtn ? submitBtn.textContent : 'Absenden';

      if (submitBtn) {
        submitBtn.textContent = 'Wird gespeichert...';
        submitBtn.disabled = true;
      }

      // Payload (IDs müssen in deinem HTML existieren)
      var payload = {
        firstname: (document.getElementById('beta-firstname')?.value || '').trim(),
        lastname: (document.getElementById('beta-lastname')?.value || '').trim(),
        email: (document.getElementById('beta-email')?.value || '').trim(),
        childrenCount: document.getElementById('beta-childrenCount')?.value || "",
        ageRange: document.getElementById('beta-ageRange')?.value || "",
        schoolType: document.getElementById('beta-schoolType')?.value || "",
        source: document.getElementById('beta-source')?.value || "",
        privacyAccepted: !!document.getElementById('beta-privacy')?.checked,
        userAgent: navigator.userAgent
      };

      fetch(WAITLIST_ENDPOINT, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(payload)
      })
        .then(function (res) { return res.json(); })
        .then(function (out) {
          if (!out || !out.ok) throw new Error((out && out.message) || 'Fehler');

          betaForm.reset();
          currentStep = 1;
          showStep(currentStep);

          if (out.already) {
            setStatus(formStatus, 'success', 'Du stehst schon auf der Beta-Liste ✅');
          } else {
            setStatus(formStatus, 'success', 'Danke! ✅ Du bist auf der Beta-Liste. Wir melden uns per E-Mail, sobald dein Zugang bereitsteht.');
          }
        })
        .catch(function () {
          setStatus(formStatus, 'error', 'Ups – das hat nicht geklappt. Bitte versuch es später erneut.');
        })
        .finally(function () {
          if (submitBtn) {
            submitBtn.textContent = original;
            submitBtn.disabled = false;
          }
        });
    });

  }
});