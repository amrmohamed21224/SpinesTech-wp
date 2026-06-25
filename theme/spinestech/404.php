<?php get_header(); ?>
<main class="pt-24 sm:pt-28 lg:pt-32 pb-20 px-margin-mobile md:px-margin-desktop text-center">
    <div class="max-w-md mx-auto">
        <h1 class="text-7xl font-bold text-primary">404</h1>
        <p class="mt-4 text-on-surface-variant"><?php echo st_locale() === 'ar' ? 'الصفحة غير موجودة' : 'Page not found'; ?></p>
        <a href="<?php echo esc_url(st_url('/')); ?>" class="inline-block mt-6 bg-secondary text-on-secondary px-6 py-3 rounded-xl font-bold"><?php echo st_locale() === 'ar' ? 'العودة للرئيسية' : 'Back home'; ?></a>
    </div>
</main>
<?php get_footer(); ?>
