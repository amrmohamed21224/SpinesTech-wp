<?php get_header(); $items = st_query_cpt('st_sector'); ?>
<main class="pt-24 sm:pt-28 lg:pt-32 pb-20 px-margin-mobile md:px-margin-desktop text-start">
    <div class="max-w-container-max mx-auto mb-16"><h1 class="text-display-lg-mobile md:text-display-lg text-primary font-bold"><?php echo esc_html(st_t('nav.sectors')); ?></h1></div>
    <div class="max-w-container-max mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter">
        <?php foreach ($items as $item) : ?>
            <a href="<?php echo esc_url(st_cpt_link('sectors', $item['slug'])); ?>" class="group relative rounded-2xl overflow-hidden min-h-[280px] border border-outline-variant/20 hover:shadow-xl transition-all">
                <?php if (!empty($item['image'])) : ?><img src="<?php echo esc_url($item['image']); ?>" alt="" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"><?php endif; ?>
                <div class="absolute inset-0 bg-gradient-to-t from-primary/90 to-transparent"></div>
                <div class="relative z-10 p-8 mt-auto flex flex-col justify-end h-full min-h-[280px] text-white">
                    <span class="material-symbols-outlined text-secondary-fixed mb-3"><?php echo esc_html($item['icon'] ?? 'domain'); ?></span>
                    <h2 class="text-headline-sm font-bold"><?php echo esc_html($item['title']); ?></h2>
                    <p class="text-sm opacity-80 mt-2"><?php echo esc_html($item['description']); ?></p>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</main>
<?php get_footer(); ?>
