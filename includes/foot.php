<?php
/**
 * Gemeinsamer Seitenabschluss: Skripte, Cookie-Banner, schließende Tags.
 * Wird als letztes auf jeder Seite eingebunden.
 */
?>
    <script src="/script.js" defer></script>
    <script src="/assets/js/motion.js" defer></script>
<?php if (!empty($needs_quiz)): ?>
    <script src="/assets/js/quiz-data.js" defer></script>
    <script src="/assets/js/quiz-demo.js" defer></script>
<?php endif; ?>
<?php if (!empty($needs_chat)): ?>
    <script src="/assets/js/chat-demo.js" defer></script>
<?php endif; ?>
<?php if (!empty($needs_forms)): ?>
    <script src="/assets/js/forms.js" defer></script>
<?php endif; ?>

    <?php include __DIR__ . '/cookie_banner.php'; ?>
    <?php /* Laedt Google Analytics – erst nach Zustimmung. Steht nach dem
             Banner, damit die Buttons beim Ausfuehren schon im DOM sind. */ ?>
    <script src="/assets/js/consent.js" defer></script>
</body>
</html>
