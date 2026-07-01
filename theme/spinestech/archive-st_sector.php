<?php get_header(); $items = st_query_cpt('st_sector'); ?>
<main class="sectors-archive">
    <div class="container">
        <header class="sectors-archive__header">
            <h1 class="sectors-archive__title"><?php echo esc_html(st_t('nav.sectors')); ?></h1>
        </header>
        <div class="sectors-archive__grid">
            <?php foreach ($items as $item) : ?>
                <a href="<?php echo esc_url(st_cpt_link('sectors', $item['slug'])); ?>" class="sector-card">
                    <?php if (!empty($item['image'])) : ?>
                        <img src="<?php echo esc_url($item['image']); ?>" alt="" class="sector-card__image" loading="lazy">
                    <?php endif; ?>
                    <div class="sector-card__overlay"></div>
                    <div class="sector-card__content">
                        <span class="material-symbols-outlined sector-card__icon"><?php echo esc_html($item['icon'] ?? 'domain'); ?></span>
                        <h2 class="sector-card__title"><?php echo esc_html($item['title']); ?></h2>
                        <p class="sector-card__description"><?php echo esc_html($item['description']); ?></p>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>
