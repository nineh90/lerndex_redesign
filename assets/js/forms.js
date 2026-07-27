/**
 * Kontakt- und Support-Formular.
 *
 * Beide posten nach /api/submit.php, das an n8n weiterreicht.
 * Das Feld data-form entscheidet, welcher Workflow angesprochen wird.
 */
(function () {
    'use strict';

    var forms = document.querySelectorAll('form[data-form]');
    if (!forms.length) return;

    forms.forEach(function (form) {
        var status = form.querySelector('.form-status');
        var submit = form.querySelector('button[type="submit"]');

        function setStatus(type, message) {
            if (!status) return;
            status.textContent = message;
            status.className = 'form-status' + (type ? ' ' + type : '');
        }

        function firstInvalid() {
            var fields = form.querySelectorAll('[required]');

            for (var i = 0; i < fields.length; i++) {
                var f = fields[i];

                if (f.type === 'checkbox' && !f.checked) {
                    return { field: f, message: 'Bitte bestätige die Datenschutzerklärung.' };
                }
                if (f.type !== 'checkbox' && !f.value.trim()) {
                    return { field: f, message: 'Bitte fülle alle Pflichtfelder aus.' };
                }
                if (f.type === 'email' && f.value && !/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(f.value)) {
                    return { field: f, message: 'Diese E-Mail-Adresse sieht nicht richtig aus.' };
                }
            }
            return null;
        }

        form.addEventListener('submit', function (e) {
            e.preventDefault();

            var problem = firstInvalid();
            if (problem) {
                setStatus('error', problem.message);
                problem.field.focus();
                return;
            }

            var payload = { form: form.dataset.form };
            new FormData(form).forEach(function (value, key) {
                payload[key] = value;
            });
            payload.privacy = form.querySelector('[name="privacy"]').checked;

            var original = submit.textContent;
            submit.disabled = true;
            submit.textContent = 'Wird gesendet …';
            setStatus('', '');

            fetch('/api/submit.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(payload)
            })
                .then(function (res) { return res.json().catch(function () { return null; }); })
                .then(function (out) {
                    if (!out || !out.ok) {
                        throw new Error((out && out.message) || 'Unbekannter Fehler');
                    }
                    form.reset();
                    setStatus('success', out.message || 'Danke! Wir melden uns.');
                })
                .catch(function (err) {
                    setStatus('error', err.message);
                })
                .finally(function () {
                    submit.disabled = false;
                    submit.textContent = original;
                });
        });
    });
})();
