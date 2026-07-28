<?php require_once __DIR__ . '/../site.php'; ?>
<header class="hero">
    <div class="hero-bg" aria-hidden="true">
        <span class="blob blob-1" data-parallax="0.10"></span>
        <span class="blob blob-2" data-parallax="-0.06"></span>
        <span class="blob blob-3" data-parallax="0.16"></span>
    </div>

    <div class="container hero-content">
        <div class="hero-text">

            <?php /* Kein Ansprache-Umschalter mehr an dieser Stelle: die Labels waren
                     mit den Navbar-Links wortgleich und sahen aus wie Navigation.
                     Der Wechsel sitzt jetzt erklaert in sections/audience_invite.php. */ ?>

            <p class="hero-eyebrow">
                <?php icon('check-circle', 'icon-sm'); ?>
                Jetzt im Google Play Store · Klasse <?= GRADE_MIN ?>–<?= GRADE_MAX ?>
            </p>

            <h1>
                <span class="for-parents">
                    Lerndex: KI-Nachhilfe, die erklärt –<br>
                    <span class="text-gradient">statt die Hausaufgaben zu machen.</span>
                </span>
                <span class="for-kids">
                    Lernen, das sich<br>
                    <span class="text-gradient">wie ein Spiel anfühlt.</span>
                </span>
            </h1>

            <?php /* Der Markenslogan steht jetzt hier statt in der H1 – die H1 muss
                     zuerst sagen, was Lerndex ist. Wortlaut identisch mit dem
                     Brand-slogan im JSON-LD (index.php). */ ?>
            <p class="hero-sub for-parents">
                Lernen, das Kinder lieben. Kontrolle, die Sie brauchen. Die App begleitet
                Ihr Kind durch den Schulstoff und zeigt Ihnen jederzeit, was gelernt wurde
                – und worüber gesprochen wurde.
            </p>
            <p class="hero-sub for-kids">
                Lexi erklärt dir alles, was du in der Schule brauchst – geduldig und
                so oft du willst. Sammle XP, halte deine Streak und schalte Avatare frei.
            </p>

            <?php /* Zwei komplette Button-Paare statt vertauschter Beschriftungen:
                     Kinder koennen kein Abo abschliessen, ihr Hauptweg ist das Demo-Quiz.
                     Ein href laesst sich nicht per CSS umschalten, also je Modus eine Gruppe. */ ?>
            <div class="hero-cta">
                <div class="hero-cta-group for-parents">
                    <a href="<?= e(PLAY_STORE_URL) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-lg">
                        <?php icon('smartphone'); ?> Gratis testen – bei Google Play
                    </a>
                    <a href="#demo-quiz-section" class="btn btn-secondary btn-lg">
                        <?php icon('target'); ?> Erst das Demo-Quiz
                    </a>
                </div>

                <div class="hero-cta-group for-kids">
                    <a href="#demo-quiz-section" class="btn btn-primary btn-lg">
                        <?php icon('target'); ?> Quiz ausprobieren
                    </a>
                    <a href="#ansicht-wechseln" class="btn btn-secondary btn-lg">
                        <?php icon('users'); ?> Zeig es deinen Eltern
                    </a>
                </div>
            </div>

            <ul class="hero-trust">
                <li><?php icon('check', 'icon-sm'); ?> <?= TRIAL_DAYS ?> Tage gratis</li>
                <li><?php icon('check', 'icon-sm'); ?> Komplett werbefrei</li>
                <li><?php icon('check', 'icon-sm'); ?> DSGVO-konform</li>
                <li><?php icon('check', 'icon-sm'); ?> Monatlich kündbar</li>
            </ul>
        </div>

        <div class="hero-visual">
            <div class="phone phone--back" data-pointer="0.5">
                <picture>
                    <source srcset="/assets/images/screenshots/hero-startscreen.webp" type="image/webp">
                    <img src="/assets/images/screenshots/hero-startscreen.jpg"
                         alt="Lerndex Startbildschirm mit dem Maskottchen Lexi"
                         width="720" height="1600" loading="eager" fetchpriority="high" decoding="async">
                </picture>
            </div>

            <div class="phone phone--front" data-pointer="1">
                <picture>
                    <source srcset="/assets/images/screenshots/dashboard-weiterfuehrend.webp" type="image/webp">
                    <img src="/assets/images/screenshots/dashboard-weiterfuehrend.jpg"
                         alt="Lerndex Schülerdashboard einer achten Klasse mit Level-Fortschritt, Lernzeit und den Fächern Mathe, Deutsch, Englisch, Biologie, Chemie, Physik und Geschichte"
                         width="720" height="1600" loading="eager" fetchpriority="high" decoding="async">
                </picture>
            </div>

            <?php /* Werte stammen aus dem gezeigten Screenshot – bei Bildwechsel mit anpassen */ ?>
            <div class="hero-chip hero-chip--xp" data-pointer="1.6">
                <strong class="count-up" data-to="136" data-suffix=" XP">136 XP</strong>
                <span>gesammelt</span>
            </div>

            <div class="hero-chip hero-chip--streak" data-pointer="2">
                <?php icon('trophy', 'icon-sm'); ?>
                <span>Noch 4 XP bis Level 3</span>
            </div>
        </div>
    </div>
</header>
