<?php
get_header();
while (have_posts()) :
    the_post();
    $id = get_the_ID();
    $icon = get_post_meta($id, 'st_icon', true) ?: 'inventory_2';
    $badge = get_post_meta($id, 'st_badge', true);
    $tagline = get_post_meta($id, 'st_tagline', true);
    $features = class_exists('SpinesTech_Headless_Meta') ? SpinesTech_Headless_Meta::get_string_list($id, 'st_features') : [];
    $highlights = st_parse_pipe_meta($id, 'st_highlights');
    $modules = st_parse_pipe_meta($id, 'st_modules');
    $use_cases = class_exists('SpinesTech_Headless_Meta') ? SpinesTech_Headless_Meta::get_string_list($id, 'st_use_cases') : [];
    $specs = class_exists('SpinesTech_Headless_Meta') ? SpinesTech_Headless_Meta::get_string_list($id, 'st_tech_specs') : [];
    if (!$highlights && $features) {
        foreach ($features as $i => $f) {
            $highlights[] = ['icon' => 'check_circle', 'title' => $f, 'body' => ''];
        }
    }
    ?>
<main class="single-product">
    <section class="single-product__hero" data-st-product-hero>
        <div class="single-product__hero-bg-pattern"></div>
        <div class="single-product__hero-glow"></div>
        <div class="container single-product__hero-container">
            <a href="<?php echo esc_url(st_url('/products/')); ?>" class="single-product__back-link">
                <span class="material-symbols-outlined">arrow_back</span>
                <?php echo esc_html(st_t('nav.products')); ?>
            </a>
            <?php if ($badge) : ?>
                <span class="single-product__badge"><?php echo esc_html($badge); ?></span>
            <?php endif; ?>
            <div class="single-product__hero-grid">
                <div class="single-product__hero-content">
                    <div class="single-product__icon-wrapper">
                        <span class="material-symbols-outlined single-product__icon"><?php echo esc_attr($icon); ?></span>
                    </div>
                    <h1 class="single-product__title"><?php the_title(); ?></h1>
                    <?php if ($tagline) : ?>
                        <p class="single-product__tagline"><?php echo esc_html($tagline); ?></p>
                    <?php endif; ?>
                    <p class="single-product__excerpt"><?php echo esc_html(get_the_excerpt()); ?></p>
                    <?php if ($features) : ?>
                        <div class="single-product__hero-features">
                            <?php foreach (array_slice($features, 0, 4) as $f) : ?>
                                <span class="single-product__hero-feature"><?php echo esc_html($f); ?></span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <div class="single-product__hero-actions">
                        <a href="<?php echo esc_url(st_url('/quote/?product=' . urlencode(get_post_field('post_name', $id)))); ?>" class="button button--secondary">
                            <?php echo esc_html(get_post_meta($id, 'st_cta_primary', true) ?: st_t('home.requestQuote')); ?>
                        </a>
                        <button type="button" data-st-open-consultation class="button button--outline-light">
                            <?php echo esc_html(st_t('nav.bookConsultation')); ?>
                        </button>
                    </div>
                </div>
                <div class="single-product__hero-stats">
                    <div class="single-product__stat-card">
                        <div class="single-product__stat-value" data-st-counter="150">0</div>
                        <div class="single-product__stat-label"><?php echo esc_html(st_t('home.projects')); ?></div>
                    </div>
                    <div class="single-product__stat-card">
                        <div class="single-product__stat-value" data-st-counter="99">0</div>
                        <div class="single-product__stat-label">SLA %</div>
                    </div>
                    <div class="single-product__stat-card single-product__stat-card--wide">
                        <div class="single-product__stat-value">24/7</div>
                        <div class="single-product__stat-label"><?php echo st_locale() === 'ar' ? 'دعم فني' : 'Support'; ?></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php if ($highlights) : ?>
    <section class="single-product__highlights">
        <div class="container single-product__highlights-grid">
            <?php foreach ($highlights as $h) : ?>
                <div class="product-highlight-card">
                    <span class="material-symbols-outlined product-highlight-card__icon"><?php echo esc_html($h['icon']); ?></span>
                    <h2 class="product-highlight-card__title"><?php echo esc_html($h['title']); ?></h2>
                    <?php if ($h['body']) : ?>
                        <p class="product-highlight-card__body"><?php echo esc_html($h['body']); ?></p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <?php endif; ?>

    <?php if ($modules) : ?>
    <section class="single-product__modules" data-st-product-modules>
        <div class="container">
            <h2 class="single-product__modules-title"><?php echo st_locale() === 'ar' ? 'الوحدات' : 'Modules'; ?></h2>
            <div class="single-product__modules-tabs">
                <?php foreach ($modules as $i => $m) : ?>
                    <button type="button" data-module="<?php echo (int) $i; ?>" class="single-product__module-tab <?php echo $i === 0 ? 'is-active' : ''; ?>">
                        <?php echo esc_html($m['title']); ?>
                    </button>
                <?php endforeach; ?>
            </div>
            <?php foreach ($modules as $i => $m) : ?>
                <div class="single-product__module-panel <?php echo $i === 0 ? 'is-active' : ''; ?>" data-panel="<?php echo (int) $i; ?>">
                    <span class="material-symbols-outlined single-product__module-icon"><?php echo esc_html($m['icon']); ?></span>
                    <h3 class="single-product__module-panel-title"><?php echo esc_html($m['title']); ?></h3>
                    <p class="single-product__module-panel-body"><?php echo esc_html($m['body']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <?php endif; ?>

    <section class="single-product__details">
        <div class="container single-product__details-grid">
            <?php if ($use_cases) : ?>
                <div class="single-product__list-section">
                    <h2 class="single-product__list-title"><?php echo st_locale() === 'ar' ? 'حالات الاستخدام' : 'Use cases'; ?></h2>
                    <ul class="single-product__list">
                        <?php foreach ($use_cases as $u) : ?>
                            <li><span class="material-symbols-outlined single-product__list-icon">check</span><?php echo esc_html($u); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <?php if ($specs) : ?>
                <div class="single-product__list-section">
                    <h2 class="single-product__list-title"><?php echo st_locale() === 'ar' ? 'المواصفات' : 'Specs'; ?></h2>
                    <ul class="single-product__list">
                        <?php foreach ($specs as $s) : ?>
                            <li><span class="material-symbols-outlined single-product__list-icon">settings</span><?php echo esc_html($s); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
        <?php if (get_the_content()) : ?>
            <div class="container single-product__content prose">
                <?php the_content(); ?>
            </div>
        <?php endif; ?>
    </section>
</main>
<?php endwhile; get_footer(); ?>
