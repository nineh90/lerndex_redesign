<div id="cookie-banner" class="cookie-banner">
    <div class="cookie-inner">
        <div class="cookie-icon">🍪</div>
        <div class="cookie-text">
            <strong>Diese Webseite verwendet Cookies</strong>
            <p>
                Wir nutzen Analyse-Cookies, um zu verstehen, wie Besucher Lerndex entdecken –
                damit wir die App und die Webseite kontinuierlich verbessern können.
                Deine Daten werden anonymisiert erfasst und nicht an Dritte weitergegeben.
                Mehr dazu in unserer <a href="/datenschutz">Datenschutzerklärung</a>.
            </p>
        </div>
        <div class="cookie-buttons">
            <button id="decline-cookies">Ablehnen</button>
            <button id="accept-cookies">Akzeptieren</button>
        </div>
    </div>
</div>

<style>
    .cookie-banner {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        background: #fff;
        border-top: 3px solid #6B21A8;
        box-shadow: 0 -8px 40px rgba(107, 33, 168, 0.12);
        z-index: 9999;
        padding: 1.5rem 0;
    }

    .cookie-inner {
        max-width: 1100px;
        margin: 0 auto;
        padding: 0 2rem;
        display: flex;
        align-items: center;
        gap: 1.25rem;
        flex-wrap: wrap;
    }

    .cookie-icon {
        font-size: 2.2rem;
        flex-shrink: 0;
        line-height: 1;
    }

    .cookie-text {
        flex: 1;
        min-width: 220px;
    }

    .cookie-text strong {
        display: block;
        font-size: 1rem;
        font-weight: 700;
        color: #1e1b4b;
        margin-bottom: 0.35rem;
    }

    .cookie-text p {
        margin: 0;
        font-size: 0.875rem;
        color: #6b7280;
        line-height: 1.6;
    }

    .cookie-text a {
        color: #6B21A8;
        text-decoration: underline;
        font-weight: 500;
    }

    .cookie-text a:hover {
        color: #7C3AED;
    }

    .cookie-buttons {
        display: flex;
        gap: 0.75rem;
        flex-shrink: 0;
    }

    .cookie-buttons button {
        padding: 0.65rem 1.5rem;
        border: none;
        border-radius: 10px;
        font-size: 0.9rem;
        font-weight: 600;
        cursor: pointer;
        font-family: inherit;
        transition: all 0.2s ease;
        white-space: nowrap;
    }

    #accept-cookies {
        background: linear-gradient(135deg, #6B21A8, #7C3AED);
        color: #fff;
        box-shadow: 0 4px 14px rgba(107, 33, 168, 0.3);
    }

    #accept-cookies:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 20px rgba(107, 33, 168, 0.4);
    }

    #decline-cookies {
        background: #f3f4f6;
        color: #6b7280;
    }

    #decline-cookies:hover {
        background: #e5e7eb;
        color: #374151;
    }

    @media (max-width: 640px) {
        .cookie-inner {
            padding: 0 1.25rem;
            gap: 1rem;
        }
        .cookie-icon {
            display: none;
        }
        .cookie-buttons {
            width: 100%;
        }
        .cookie-buttons button {
            flex: 1;
        }
    }
</style>

<script>
    const banner    = document.getElementById("cookie-banner");
    const acceptBtn = document.getElementById("accept-cookies");
    const declineBtn= document.getElementById("decline-cookies");
    const savedConsent = localStorage.getItem("lerndex_cookie_consent");

    if (savedConsent === "accepted") {
        gtag('consent', 'update', { 'analytics_storage': 'granted' });
        banner.style.display = "none";
    }
    if (savedConsent === "declined") {
        banner.style.display = "none";
    }

    acceptBtn.addEventListener("click", () => {
        gtag('consent', 'update', { 'analytics_storage': 'granted' });
        localStorage.setItem("lerndex_cookie_consent", "accepted");
        banner.style.display = "none";
    });

    declineBtn.addEventListener("click", () => {
        localStorage.setItem("lerndex_cookie_consent", "declined");
        banner.style.display = "none";
    });
</script>