<?php get_header(); $items = st_query_cpt('st_case_study'); ?>
<main class="pt-24 sm:pt-28 lg:pt-32 pb-20 px-margin-mobile md:px-margin-desktop text-start">
    <div class="max-w-container-max mx-auto mb-16"><h1 class="text-display-lg-mobile md:text-display-lg text-primary font-bold"><?php echo esc_html(st_t('nav.caseStudies')); ?></h1></div>
    <div class="max-w-container-max mx-auto grid grid-cols-1 md:grid-cols-2 gap-gutter">
        <?php foreach ($items as $c) : ?>
            <a href="<?php echo esc_url(st_cpt_link('case-studies', $c['slug'])); ?>" class="group bg-white border border-outline-variant/30 rounded-2xl overflow-hidden hover:shadow-xl transition-all">
                <?php if (!empty($c['image'])) : ?><img src="<?php echo esc_url($c['image']); ?>" alt="" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500"><?php endif; ?>
                <div class="p-8">
                    <span class="text-caption text-secondary font-bold"><?php echo esc_html($c['sector'] ?? ''); ?></span>
                    <h2 class="text-headline-sm font-bold text-primary mt-2 mb-3"><?php echo esc_html($c['title']); ?></h2>
                    <p class="text-on-surface-variant text-sm line-clamp-2"><?php echo esc_html($c['result'] ?? $c['challenge'] ?? ''); ?></p>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</main>
<?php get_footer(); ?>
