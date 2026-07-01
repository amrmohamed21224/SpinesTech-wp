<?php get_header(); $products = st_query_cpt('st_product'); $arrow = st_locale() === 'ar' ? 'arrow_back' : 'arrow_forward'; ?>
<main class="products-archive">
    <div class="container">
        <header class="products-archive__header">
            <h1 class="products-archive__title"><?php echo esc_html(st_t('nav.products')); ?></h1>
        </header>
        <div class="products-archive__grid">
            <?php foreach ($products as $p) : ?>
                <a href="<?php echo esc_url(st_cpt_link('products', $p['slug'])); ?>" class="product-card">
                    <?php if (!empty($p['badge'])): ?>
                    <span class="product-card__badge"><?php echo esc_html($p['badge']); ?></span>
                    <?php endif; ?>
                    <h2 class="product-card__title"><?php echo esc_html($p['title']); ?></h2>
                    <p class="product-card__description"><?php echo esc_html($p['description']); ?></p>
                    <span class="product-card__link">
                        <?php echo esc_html(st_t('common.learnMore')); ?>
                        <span class="material-symbols-outlined"><?php echo esc_html($arrow); ?></span>
                    </span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>
