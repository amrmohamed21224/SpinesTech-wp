<?php get_header(); ?>
<?php
$arrow = st_locale() === 'ar' ? 'arrow_back' : 'arrow_forward';
$trust = ['home.trustCustom', 'home.trustErp', 'home.trustAi', 'home.trustLocal'];
?>
<header class="relative pt-24 sm:pt-28 md:pt-40 lg:pt-48 pb-16 md:pb-32 px-margin-mobile md:px-margin-desktop overflow-hidden gradient-mesh">
    <div class="max-w-container-max mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center text-start">
            <div class="z-10 order-2 lg:order-1">
                <h1 class="text-display-lg-mobile md:text-display-lg mb-6 leading-tight text-primary font-bold"><?php echo esc_html(st_t('home.heroTitle')); ?></h1>
                <p class="text-body-lg text-on-surface-variant mb-10 max-w-xl"><?php echo esc_html(st_t('home.heroSubtitle')); ?></p>
                <div class="flex flex-wrap gap-3 sm:gap-4 mb-12">
                    <a href="<?php echo esc_url(st_url('/consultation/')); ?>" class="bg-secondary text-on-secondary px-6 sm:px-8 py-3.5 sm:py-4 rounded-xl font-bold inline-flex items-center gap-2 hover:bg-secondary-fixed-variant transition-all"><?php echo esc_html(st_t('home.bookConsultation')); ?><span class="material-symbols-outlined"><?php echo esc_html($arrow); ?></span></a>
                    <a href="<?php echo esc_url(st_url('/quote/')); ?>" class="border-2 border-secondary text-secondary px-6 sm:px-8 py-3.5 sm:py-4 rounded-xl font-bold hover:bg-secondary/5 transition-all"><?php echo esc_html(st_t('home.requestQuote')); ?></a>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 pt-8 border-t border-outline-variant/30">
                    <?php foreach ($trust as $key) : ?>
                        <div class="flex items-center gap-2"><span class="material-symbols-outlined text-secondary" style="font-variation-settings:'FILL' 1">check_circle</span><span class="text-label-md text-on-surface"><?php echo esc_html(st_t($key)); ?></span></div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="relative order-1 lg:order-2">
                <div class="absolute inset-0 bg-secondary/10 rounded-3xl -rotate-3 scale-105"></div>
                <img src="<?php echo esc_url(st_asset('images/about/hero.png')); ?>" alt="" class="rounded-3xl shadow-2xl relative z-10 w-full object-cover aspect-[1.79]" loading="eager">
            </div>
        </div>
    </div>
</header>
<?php get_template_part('template-parts/home/sections'); ?>
<?php get_footer(); ?>
