<?php get_header(); $products = st_query_cpt('st_product'); $arrow = st_locale() === 'ar' ? 'arrow_back' : 'arrow_forward'; ?>
<main class="pt-24 sm:pt-28 lg:pt-32 pb-20 px-margin-mobile md:px-margin-desktop text-start">
    <div class="max-w-container-max mx-auto mb-16"><h1 class="text-display-lg-mobile md:text-display-lg text-primary font-bold"><?php echo esc_html(st_t('nav.products')); ?></h1></div>
    <div class="max-w-container-max mx-auto grid grid-cols-1 md:grid-cols-2 gap-gutter">
        <?php foreach ($products as $p) : ?>
            <a href="<?php echo esc_url(st_cpt_link('products', $p['slug'])); ?>" class="group p-8 bg-white border border-outline-variant/30 rounded-2xl hover:shadow-xl hover:-translate-y-1 transition-all">
                <span class="inline-block px-3 py-1 bg-secondary/10 text-secondary text-caption font-bold rounded-full mb-4"><?php echo esc_html($p['badge'] ?? ''); ?></span>
                <h2 class="text-headline-sm mb-4 font-bold text-primary"><?php echo esc_html($p['title']); ?></h2>
                <p class="text-on-surface-variant mb-6"><?php echo esc_html($p['description']); ?></p>
                <span class="text-secondary font-bold inline-flex items-center gap-2"><?php echo esc_html(st_t('common.learnMore')); ?><span class="material-symbols-outlined"><?php echo esc_html($arrow); ?></span></span>
            </a>
        <?php endforeach; ?>
    </div>
</main>
<?php get_footer(); ?>
