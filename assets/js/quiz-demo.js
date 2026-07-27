/**
 * Demo-Quiz auf der Startseite.
 *
 * Zeigt das Produkt, statt es zu beschreiben: Klasse und Fach wählen,
 * drei Fragen lösen, XP kassieren. Kein Backend, kein Tracking – alles
 * läuft im Browser.
 *
 * Der wichtigste Teil ist nicht "richtig/falsch", sondern die Erklärung
 * danach. Genau das unterscheidet Lerndex von einem Abfrageprogramm.
 */
(function () {
    'use strict';

    var root = document.getElementById('demo-quiz');
    if (!root || !window.LERNDEX_QUIZ) return;

    var DATA = window.LERNDEX_QUIZ;
    var XP_PER_CORRECT = 10;

    var state = { band: null, subject: null, index: 0, correct: 0, questions: [] };

    var elSetup   = root.querySelector('[data-quiz="setup"]');
    var elPlay    = root.querySelector('[data-quiz="play"]');
    var elResult  = root.querySelector('[data-quiz="result"]');
    var elBands   = root.querySelector('[data-quiz="bands"]');
    var elSubjects= root.querySelector('[data-quiz="subjects"]');
    var elStart   = root.querySelector('[data-quiz="start"]');

    var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    // ── Aufbau: Auswahlknöpfe ────────────────────────────────
    DATA.bands.forEach(function (b, i) {
        var btn = document.createElement('button');
        btn.type = 'button';
        btn.className = 'chip';
        btn.textContent = b.label;
        btn.setAttribute('aria-pressed', 'false');
        btn.addEventListener('click', function () { pick('band', b.id, elBands, btn); });
        elBands.appendChild(btn);
        if (i === 1) btn.click();          // Klasse 3–4 vorbelegt
    });

    DATA.subjects.forEach(function (s, i) {
        var btn = document.createElement('button');
        btn.type = 'button';
        btn.className = 'chip';
        btn.innerHTML = '<span aria-hidden="true">' + s.emoji + '</span> ' + s.label;
        btn.setAttribute('aria-pressed', 'false');
        btn.addEventListener('click', function () { pick('subject', s.id, elSubjects, btn); });
        elSubjects.appendChild(btn);
        if (i === 0) btn.click();          // Mathe vorbelegt
    });

    function pick(key, value, group, btn) {
        state[key] = value;
        group.querySelectorAll('.chip').forEach(function (c) {
            c.classList.remove('is-active');
            c.setAttribute('aria-pressed', 'false');
        });
        btn.classList.add('is-active');
        btn.setAttribute('aria-pressed', 'true');
    }

    // ── Start ────────────────────────────────────────────────
    elStart.addEventListener('click', function () {
        var pool = (DATA.questions[state.band] || {})[state.subject];
        if (!pool || !pool.length) return;

        state.questions = pool.slice();
        state.index = 0;
        state.correct = 0;

        elSetup.hidden = true;
        elResult.hidden = true;
        elPlay.hidden = false;

        renderQuestion();
        elPlay.querySelector('.quiz-question').focus();
    });

    // ── Frage anzeigen ───────────────────────────────────────
    function renderQuestion() {
        var q = state.questions[state.index];
        var total = state.questions.length;

        elPlay.innerHTML = '';

        var head = document.createElement('div');
        head.className = 'quiz-head';
        head.innerHTML =
            '<span class="quiz-counter">Frage ' + (state.index + 1) + ' von ' + total + '</span>' +
            '<span class="quiz-score">' + (state.correct * XP_PER_CORRECT) + ' XP</span>';
        elPlay.appendChild(head);

        var bar = document.createElement('div');
        bar.className = 'quiz-progress';
        bar.innerHTML = '<span style="width:' + ((state.index / total) * 100) + '%"></span>';
        elPlay.appendChild(bar);

        var question = document.createElement('h3');
        question.className = 'quiz-question';
        question.tabIndex = -1;
        question.textContent = q.q;
        elPlay.appendChild(question);

        var list = document.createElement('div');
        list.className = 'quiz-answers';

        q.a.forEach(function (answer, i) {
            var btn = document.createElement('button');
            btn.type = 'button';
            btn.className = 'quiz-answer';
            btn.textContent = answer;
            btn.addEventListener('click', function () { answerPicked(i, list, q); });
            list.appendChild(btn);
        });

        elPlay.appendChild(list);
    }

    // ── Antwort ausgewertet ──────────────────────────────────
    function answerPicked(chosen, list, q) {
        var buttons = list.querySelectorAll('.quiz-answer');
        var right = chosen === q.correct;

        if (right) state.correct++;

        buttons.forEach(function (b, i) {
            b.disabled = true;
            if (i === q.correct) b.classList.add('is-correct');
            if (i === chosen && !right) b.classList.add('is-wrong');
        });

        // Erklärung – das eigentliche Argument der Demo
        var why = document.createElement('div');
        why.className = 'quiz-why' + (right ? ' is-right' : '');
        why.innerHTML =
            '<strong>' + (right ? 'Richtig.' : 'Nicht ganz.') + '</strong> ' + q.why;
        elPlay.appendChild(why);

        var next = document.createElement('button');
        next.type = 'button';
        next.className = 'btn btn-primary quiz-next';
        next.textContent = state.index + 1 < state.questions.length
            ? 'Nächste Frage'
            : 'Ergebnis ansehen';

        next.addEventListener('click', function () {
            state.index++;
            if (state.index < state.questions.length) {
                renderQuestion();
                elPlay.querySelector('.quiz-question').focus();
            } else {
                showResult();
            }
        });

        elPlay.appendChild(next);
        next.focus();
    }

    // ── Ergebnis ─────────────────────────────────────────────
    function showResult() {
        var total = state.questions.length;
        var xp = state.correct * XP_PER_CORRECT;
        var pct = Math.round((state.correct / total) * 100);
        var stars = state.correct === total ? 3 : (state.correct >= total - 1 ? 2 : 1);

        elPlay.hidden = true;
        elResult.hidden = false;

        var headline = state.correct === total
            ? 'Alles richtig.'
            : (state.correct >= total - 1 ? 'Fast alles richtig.' : 'Da geht noch was.');

        elResult.innerHTML =
            '<div class="quiz-stars" aria-hidden="true">' +
                '★★★'.split('').map(function (s, i) {
                    return '<span class="' + (i < stars ? 'is-on' : '') + '">★</span>';
                }).join('') +
            '</div>' +
            '<h3>' + headline + '</h3>' +
            '<p class="quiz-result-line">' + state.correct + ' von ' + total +
                ' richtig · <strong>' + xp + ' XP</strong></p>' +
            '<div class="bar quiz-result-bar is-visible" style="--bar-value:' + pct + '%"><span></span></div>' +
            '<p class="quiz-result-note">In der App zählen diese XP auf dein Level ein – ' +
                'und der Tutor erklärt dir jede Aufgabe so lange, bis sie sitzt.</p>' +
            '<div class="quiz-result-cta"></div>';

        var cta = elResult.querySelector('.quiz-result-cta');

        var download = document.createElement('a');
        download.className = 'btn btn-primary btn-lg';
        download.href = root.dataset.store;
        download.target = '_blank';
        download.rel = 'noopener noreferrer';
        download.textContent = 'Kostenlos weiterlernen';
        cta.appendChild(download);

        var again = document.createElement('button');
        again.type = 'button';
        again.className = 'btn btn-ghost';
        again.textContent = 'Anderes Fach probieren';
        again.addEventListener('click', function () {
            elResult.hidden = true;
            elSetup.hidden = false;
            elSetup.scrollIntoView({ behavior: reduce ? 'auto' : 'smooth', block: 'center' });
        });
        cta.appendChild(again);
    }
})();
