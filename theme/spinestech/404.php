<?php get_header(); ?>
<main class="page-404">
    <div class="page-404__content">
        <h1 class="page-404__code">404</h1>
        <p class="page-404__message"><?php echo st_locale() === 'ar' ? 'Ø§Ù„ØµÙØ­Ø© ØºÙŠØ± Ù…ÙˆØ¬ÙˆØ¯Ø©' : 'Page not found'; ?></p>
        <a href="<?php echo esc_url(st_url('/')); ?>" class="button button--secondary page-404__btn">
            <?php echo st_locale() === 'ar' ? 'Ø§Ù„Ø¹ÙˆØ¯Ø© Ù„Ù„Ø±Ø¦ÙŠØ³ÙŠØ©' : 'Back home'; ?>
        </a>
    </div>
</main>
<?php get_footer(); ?>
