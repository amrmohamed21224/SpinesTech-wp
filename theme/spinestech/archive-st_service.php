<?php get_header(); $services = st_query_cpt('st_service'); $arrow = st_locale() === 'ar' ? 'arrow_back' : 'arrow_forward'; ?>
<main class="pt-24 sm:pt-28 lg:pt-32 pb-20 px-margin-mobile md:px-margin-desktop text-start">
    <div class="max-w-container-max mx-auto mb-16">
        <h1 class="text-display-lg-mobile md:text-display-lg mb-6 text-primary font-bold"><?php echo esc_html(st_t('services.heroTitle')); ?></h1>
    </div>
    <div class="max-w-container-max mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter">
        <?php foreach ($services as $s) : ?>
            <a href="<?php echo esc_url(st_cpt_link('services', $s['slug'])); ?>" class="group p-8 bg-white border border-outline-variant/30 rounded-2xl hover:border-secondary hover:shadow-xl transition-all">
                <div class="bg-secondary/10 w-16 h-16 rounded-xl flex items-center justify-center mb-6 group-hover:bg-secondary group-hover:text-white transition-colors"><span class="material-symbols-outlined text-3xl"><?php echo esc_html($s['icon'] ?? 'code'); ?></span></div>
                <h2 class="text-headline-sm mb-4 text-primary font-bold"><?php echo esc_html($s['title']); ?></h2>
                <p class="text-on-surface-variant mb-4"><?php echo esc_html($s['description']); ?></p>
                <span class="inline-flex items-center gap-2 font-bold text-secondary"><?php echo esc_html(st_t('common.learnMore')); ?><span class="material-symbols-outlined"><?php echo esc_html($arrow); ?></span></span>
            </a>
        <?php endforeach; ?>
    </div>
</main>
<?php get_footer(); ?>
