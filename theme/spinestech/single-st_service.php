<?php
get_header();
while (have_posts()) : the_post();
    $id = get_the_ID();
    $icon = get_post_meta($id, 'st_icon', true) ?: 'code';
    $features = class_exists('SpinesTech_Headless_Meta') ? SpinesTech_Headless_Meta::get_string_list($id, 'st_features') : [];
?>
<main class="single-service">
    <div class="container">
        <a href="<?php echo esc_url(st_url('/services/')); ?>" class="single-service__back-link">
            <span class="material-symbols-outlined">arrow_back</span>
            <?php echo esc_html(st_t('services.viewAll')); ?>
        </a>
        <div class="single-service__grid">
            <div class="single-service__main">
                <header class="single-service__header">
                    <span class="material-symbols-outlined single-service__icon"><?php echo esc_attr($icon); ?></span>
                    <h1 class="single-service__title"><?php the_title(); ?></h1>
                </header>
                <p class="single-service__excerpt"><?php echo esc_html(get_the_excerpt()); ?></p>
                <div class="single-service__content prose">
                    <?php the_content(); ?>
                </div>
                <?php if ($features) : ?>
                    <ul class="single-service__features">
                        <?php foreach ($features as $f) : ?>
                        <li>
                            <span class="single-service__feature-bullet"></span>
                            <?php echo esc_html($f); ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
            <aside class="single-service__sidebar">
                <div class="single-service__actions">
                    <a href="<?php echo esc_url(st_url('/quote/')); ?>" class="button button--primary single-service__button">
                        <?php echo esc_html(st_t('home.requestQuote')); ?>
                    </a>
                    <button type="button" data-st-open-consultation class="button button--outline single-service__button">
                        <?php echo esc_html(st_t('nav.bookConsultation')); ?>
                    </button>
                </div>
            </aside>
        </div>
    </div>
</main>
<?php endwhile; get_footer(); ?>
