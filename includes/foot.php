<?php
/**
 * Gemeinsamer Seitenabschluss: Skripte, Cookie-Banner, schließende Tags.
 * Wird als letztes auf jeder Seite eingebunden.
 */
?>
    <script src="<?= asset('/script.js') ?>" defer></script>
    <script src="<?= asset('/assets/js/motion.js') ?>" defer></script>
<?php if (!empty($needs_quiz)): ?>
    <script src="<?= asset('/assets/js/quiz-data.js') ?>" defer></script>
    <script src="<?= asset('/assets/js/quiz-demo.js') ?>" defer></script>
<?php endif; ?>
<?php if (!empty($needs_chat)): ?>
    <script src="<?= asset('/assets/js/chat-demo.js') ?>" defer></script>
<?php endif; ?>
<?php if (!empty($needs_kids)): ?>
    <script src="<?= asset('/assets/js/kids.js') ?>" defer></script>
<?php endif; ?>
<?php if (!empty($needs_forms)): ?>
    <script src="<?= asset('/assets/js/forms.js') ?>" defer></script>
<?php endif; ?>

    <?php include __DIR__ . '/cookie_banner.php'; ?>
    <?php /* Laedt Google Analytics – erst nach Zustimmung. Steht nach dem
             Banner, damit die Buttons beim Ausfuehren schon im DOM sind. */ ?>
    <script src="<?= asset('/assets/js/consent.js') ?>" defer></script>
</body>
</html>
