<section class="section dashboard-slider">
    <div class="container">

        <div class="section-header">
            <h2>Lerndex wächst mit deinem Kind mit</h2>
            <p>Jede Altersgruppe bekommt genau das Dashboard, das zu ihr passt.</p>
        </div>

        <div class="slider-wrapper">

            <div class="slider-track" id="slider-track">

                <!-- Slide 1 -->
                <div class="slide">
                    <div class="slide-mockup">
                        <img
                            src="assets/images/screenshots/dashboard-grundschule-1-2.jpeg"
                            alt="Lerndex Schülerdashboard Klasse 1 und 2 – sprachgeführtes Interface mit großen Buttons und Vorlesefunktion"
                            class="mockup-img">
                    </div>
                    <div class="slide-content">
                        <span class="badge">Klasse 1 & 2</span>
                        <h3>Sprachgeführtes Dashboard</h3>
                        <p>Große Buttons, einfache Sprache und eine Vorlesefunktion führen die Kleinsten sicher durch die App – ganz ohne Lesen zu müssen.</p>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="slide">
                    <div class="slide-mockup">
                        <img
                            src="assets/images/screenshots/dashboard-grundschule-3-4.jpeg"
                            alt="Lerndex Schülerdashboard Klasse 3 und 4 – Dashboard mit KI-Tutor Zugang und ersten Lernstatistiken"
                            class="mockup-img">
                    </div>
                    <div class="slide-content">
                        <span class="badge">Klasse 3 & 4</span>
                        <h3>Mit KI-Tutor</h3>
                        <p>Jetzt kommt der KI-Tutor dazu: Fragen stellen, Aufgaben lösen und erste Lernstatistiken entdecken – alles kindgerecht aufbereitet.</p>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="slide">
                    <div class="slide-mockup">
                        <img
                            src="assets/images/screenshots/dashboard-weiterfuehrend.jpeg"
                            alt="Lerndex Schülerdashboard weiterführende Schule – personalisiertes Dashboard mit Fächerwahl, XP-System und Lernzielen"
                            class="mockup-img">
                    </div>
                    <div class="slide-content">
                        <span class="badge">Weiterführende Schule</span>
                        <h3>Persönliches Dashboard</h3>
                        <p>Fächer priorisieren, Lernziele setzen und den eigenen Fortschritt mit XP und Level im Blick behalten.</p>
                    </div>
                </div>

            </div>

            <button class="slider-btn slider-btn-prev" id="slider-prev" aria-label="Vorheriges Dashboard">
                <i data-lucide="chevron-left"></i>
            </button>
            <button class="slider-btn slider-btn-next" id="slider-next" aria-label="Nächstes Dashboard">
                <i data-lucide="chevron-right"></i>
            </button>

        </div>

        <div class="slider-dots">
            <button class="slider-dot active" data-index="0" aria-label="Dashboard 1"></button>
            <button class="slider-dot" data-index="1" aria-label="Dashboard 2"></button>
            <button class="slider-dot" data-index="2" aria-label="Dashboard 3"></button>
        </div>

    </div>
</section>

<style>
    /* ── Section ── */
    .dashboard-slider {
        background: var(--bg-light);
        max-height: 100vh;
        overflow: hidden;
        box-sizing: border-box;
        padding-top: 2.5rem;
        padding-bottom: 1.5rem;
        display: flex;
        align-items: center;
    }

    .dashboard-slider .container {
        width: 100%;
    }

    .dashboard-slider .section-header {
        margin-bottom: 1.25rem;
    }

    .dashboard-slider .section-header h2 {
        font-size: clamp(1.4rem, 2.5vw, 2rem);
        margin-bottom: 0.3rem;
    }

    .dashboard-slider .section-header p {
        font-size: clamp(0.85rem, 1.5vw, 1rem);
        margin: 0;
    }

    /* ── Slider wrapper ── */
    .slider-wrapper {
        position: relative;
        max-width: 260px;
        margin: 0 auto;
        padding: 0 12px;
    }

    .slider-track {
        display: flex;
        transition: transform 0.45s cubic-bezier(0.4, 0, 0.2, 1);
        will-change: transform;
    }

    /* ── Slide ── */
    .slide {
        min-width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 1rem;
    }

    /* ── Smartphone-Mockup ── */
    /* NACHHER */
.slide-mockup {
    width: fit-content;     /* ← Container passt sich dem Bild an */
    margin: 0 auto;
    border-radius: 2rem;
    overflow: hidden;
    box-shadow:
        0 20px 50px rgba(107, 33, 168, 0.2),
        0 6px 20px rgba(0, 0, 0, 0.1);
    border: 3px solid rgba(107, 33, 168, 0.15);
    background: transparent;
}

.slide-mockup .mockup-img {
    display: block;
    height: 46vh;
    width: auto;            /* ← Breite folgt dem echten Bildseitenverhältnis */
    max-width: 100%;
    object-fit: contain;
}
    /* ── Text darunter ── */
    .slide-content {
        text-align: center;
        padding: 0 0.25rem;
    }

    .slide-content .badge {
        display: inline-block;
        margin-bottom: 0.35rem;
    }

    .slide-content h3 {
        font-size: clamp(0.95rem, 1.8vw, 1.2rem);
        font-weight: 700;
        color: var(--text-dark);
        margin: 0 0 0.3rem;
        line-height: 1.3;
    }

    .slide-content p {
        font-size: clamp(0.78rem, 1.3vw, 0.9rem);
        color: var(--text-gray);
        line-height: 1.55;
        margin: 0;
    }

    /* ── Arrows ── */
    .slider-btn {
        position: absolute;
        top: 30%;                   /* zentriert auf dem Bild */
        transform: translateY(-50%);
        background: var(--white);
        border: 2px solid rgba(107, 33, 168, 0.15);
        border-radius: 50%;
        width: 38px;
        height: 38px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        color: var(--primary);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: all 0.2s ease;
        z-index: 10;
    }

    .slider-btn:hover {
        background: var(--primary);
        color: var(--white);
        border-color: var(--primary);
        transform: translateY(-50%) scale(1.08);
    }

    .slider-btn-prev { left: -26px; }
    .slider-btn-next { right: -26px; }

    /* ── Dots ── */
    .slider-dots {
        display: flex;
        justify-content: center;
        gap: 0.6rem;
        margin-top: 1rem;
    }

    .slider-dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        border: none;
        background: rgba(107, 33, 168, 0.2);
        cursor: pointer;
        transition: all 0.3s ease;
        padding: 0;
    }

    .slider-dot.active {
        background: var(--primary);
        width: 28px;
        border-radius: 5px;
    }

    /* ── Tablet ── */
    @media (min-width: 768px) {
        .slider-wrapper {
            max-width: 320px;
        }
        .slide-mockup {
            max-height: 48vh;
        }
    }

    /* ── Desktop ── */
    @media (min-width: 1024px) {
        .slider-wrapper {
            max-width: 300px;
        }
        .slide-mockup {
            max-height: 50vh;
        }
    }
</style>

<script>
    (function () {
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
    })();
</script>