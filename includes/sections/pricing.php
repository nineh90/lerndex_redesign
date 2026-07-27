<section id="preise" class="section pricing">
    <div class="container">
        <div class="section-header">
            <h2>Einfache, faire Preise</h2>
            <p>Kein Vertrag. Monatlich kündbar. <strong>14 Tage kostenlos</strong> testen.</p>
        </div>

        <div class="pricing-grid">

            <!-- Solo -->
            <div class="pricing-card">
                <div class="pricing-icon bg-blue"><i data-lucide="user"></i></div>
                <div class="pricing-name">Solo</div>
                <div class="pricing-price">
                    <span class="pricing-amount">12,99 €</span>
                    <span class="pricing-period">/ Monat</span>
                </div>
                <div class="pricing-children">Für 1 Kind</div>
                <ul class="pricing-features">
                    <li><i data-lucide="check-circle"></i> KI-Tutor & Quizze</li>
                    <li><i data-lucide="check-circle"></i> Eltern-Dashboard</li>
                    <li><i data-lucide="check-circle"></i> Alle Fächer</li>
                    <li><i data-lucide="check-circle"></i> Monatlich kündbar</li>
                </ul>
            </div>

            <!-- Duo -->
            <div class="pricing-card pricing-card--featured">
                <div class="pricing-badge-top">Beliebt</div>
                <div class="pricing-icon bg-purple"><i data-lucide="users"></i></div>
                <div class="pricing-name">Duo</div>
                <div class="pricing-price">
                    <span class="pricing-amount">24,99 €</span>
                    <span class="pricing-period">/ Monat</span>
                </div>
                <div class="pricing-children">Für 2 Kinder</div>
                <ul class="pricing-features">
                    <li><i data-lucide="check-circle"></i> KI-Tutor & Quizze</li>
                    <li><i data-lucide="check-circle"></i> Eltern-Dashboard</li>
                    <li><i data-lucide="check-circle"></i> Alle Fächer</li>
                    <li><i data-lucide="check-circle"></i> Monatlich kündbar</li>
                </ul>
            </div>

            <!-- Family -->
            <div class="pricing-card">
                <div class="pricing-icon bg-green"><i data-lucide="house"></i></div>
                <div class="pricing-name">Family</div>
                <div class="pricing-price">
                    <span class="pricing-amount">39,99 €</span>
                    <span class="pricing-period">/ Monat</span>
                </div>
                <div class="pricing-children">Bis zu 4 Kinder</div>
                <ul class="pricing-features">
                    <li><i data-lucide="check-circle"></i> KI-Tutor & Quizze</li>
                    <li><i data-lucide="check-circle"></i> Eltern-Dashboard</li>
                    <li><i data-lucide="check-circle"></i> Alle Fächer</li>
                    <li><i data-lucide="check-circle"></i> Monatlich kündbar</li>
                    <li><i data-lucide="check-circle"></i> +6,99 € je weiteres Kind</li>
                </ul>
            </div>

        </div>

    </div>
</section>

<style>
    .pricing {
        background: var(--white);
    }

    .pricing-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 2rem;
        align-items: stretch;
    }

    /* ── Card ── */
    .pricing-card {
        background: var(--white);
        border: 2px solid rgba(74, 29, 150, 0.08);
        border-radius: var(--radius);
        padding: 2rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        gap: 1rem;
        position: relative;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: var(--shadow);
    }

    .pricing-card:hover {
        transform: translateY(-6px);
        box-shadow: var(--shadow-hover);
    }

    /* Featured card */
    .pricing-card--featured {
        border-color: var(--secondary);
        background: linear-gradient(160deg, #faf5ff 0%, #ffffff 100%);
        box-shadow: 0 8px 32px rgba(124, 58, 237, 0.15);
    }

    .pricing-badge-top {
        position: absolute;
        top: -14px;
        left: 50%;
        transform: translateX(-50%);
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        color: #fff;
        font-size: 0.75rem;
        font-weight: 700;
        padding: 0.3rem 1rem;
        border-radius: 99px;
        letter-spacing: 0.05em;
        white-space: nowrap;
    }

    /* ── Icon ── */
    .pricing-icon {
        width: 56px;
        height: 56px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* ── Name ── */
    .pricing-name {
        font-size: 1.25rem;
        font-weight: 800;
        color: var(--text-dark);
    }

    /* ── Price ── */
    .pricing-price {
        display: flex;
        align-items: baseline;
        gap: 0.25rem;
    }

    .pricing-amount {
        font-size: 2.25rem;
        font-weight: 800;
        color: var(--primary);
        line-height: 1;
    }

    .pricing-period {
        font-size: 0.9rem;
        color: var(--text-gray);
        font-weight: 500;
    }

    /* ── Children tag ── */
    .pricing-children {
        background: var(--bg-light);
        color: var(--secondary);
        font-size: 0.8rem;
        font-weight: 700;
        padding: 0.3rem 0.85rem;
        border-radius: 99px;
    }

    /* ── Features ── */
    .pricing-features {
        list-style: none;
        padding: 0;
        margin: 0;
        text-align: left;
        width: 100%;
        display: flex;
        flex-direction: column;
        gap: 0.6rem;
    }

    .pricing-features li {
        display: flex;
        align-items: center;
        gap: 0.6rem;
        font-size: 0.9rem;
        color: var(--text-gray);
        font-weight: 500;
    }

    .pricing-features li svg {
        color: var(--success);
        width: 18px;
        height: 18px;
        flex-shrink: 0;
    }

    /* ── Button ── */
    .pricing-btn {
        width: 100%;
        text-align: center;
        margin-top: auto;
        padding: 0.85rem 1.5rem;
    }

    /* ── Hinweis ── */
    .pricing-note {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.6rem;
        margin-top: 2.5rem;
        background: var(--bg-light);
        border: 1px solid rgba(124, 58, 237, 0.15);
        border-radius: 14px;
        padding: 1rem 1.5rem;
        color: var(--text-gray);
        font-size: 0.9rem;
        max-width: 560px;
        margin-left: auto;
        margin-right: auto;
    }

    .pricing-note svg {
        color: var(--secondary);
        width: 20px;
        height: 20px;
        flex-shrink: 0;
    }

    .pricing-note strong {
        color: var(--primary);
    }

    @media (max-width: 767px) {
        .pricing-grid {
            grid-template-columns: 1fr;
            max-width: 360px;
            margin: 0 auto;
        }
    }
</style>