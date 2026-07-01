<?php get_header(); while (have_posts()) : the_post();
    $id = get_the_ID();
    $reqs = class_exists('SpinesTech_Headless_Meta') ? SpinesTech_Headless_Meta::get_string_list($id, 'st_requirements') : [];
    $benefits = class_exists('SpinesTech_Headless_Meta') ? SpinesTech_Headless_Meta::get_string_list($id, 'st_benefits') : [];
?>
<main class="single-job">
    <div class="container">
        <a href="<?php echo esc_url(st_url('/careers/jobs/')); ?>" class="single-job__back-link">
            <?php echo esc_html(st_t('careers.jobsTitle')); ?>
        </a>
        <div class="single-job__grid">
            <div class="single-job__main">
                <span class="single-job__department"><?php echo esc_html(get_post_meta($id, 'st_department', true)); ?></span>
                <h1 class="single-job__title"><?php the_title(); ?></h1>
                <p class="single-job__excerpt"><?php echo esc_html(get_the_excerpt()); ?></p>
                
                <div class="single-job__content prose">
                    <?php the_content(); ?>
                </div>

                <?php if ($reqs) : ?>
                <div class="single-job__section">
                    <h2 class="single-job__section-title"><?php echo st_locale() === 'ar' ? 'المتطلبات' : 'Requirements'; ?></h2>
                    <ul class="single-job__list">
                        <?php foreach ($reqs as $r) : ?><li><?php echo esc_html($r); ?></li><?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>

                <?php if ($benefits) : ?>
                <div class="single-job__section">
                    <h2 class="single-job__section-title"><?php echo st_locale() === 'ar' ? 'المميزات' : 'Benefits'; ?></h2>
                    <ul class="single-job__list">
                        <?php foreach ($benefits as $b) : ?><li><?php echo esc_html($b); ?></li><?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>
            </div>

            <aside class="single-job__sidebar">
                <div class="single-job__meta-card">
                    <ul class="single-job__meta-list">
                        <?php if ($loc = get_post_meta($id, 'st_location', true)) : ?>
                        <li class="single-job__meta-item">
                            <span class="material-symbols-outlined single-job__meta-icon">location_on</span>
                            <?php echo esc_html($loc); ?>
                        </li>
                        <?php endif; ?>
                        <?php if ($type = get_post_meta($id, 'st_type', true)) : ?>
                        <li class="single-job__meta-item"><?php echo esc_html($type); ?></li>
                        <?php endif; ?>
                        <?php if ($exp = get_post_meta($id, 'st_experience', true)) : ?>
                        <li class="single-job__meta-item"><?php echo esc_html($exp); ?></li>
                        <?php endif; ?>
                    </ul>
                    <a href="<?php echo esc_url(st_url('/careers/jobs/#career-form')); ?>" class="button button--primary single-job__apply-btn">
                        <?php echo esc_html(st_t('careers.applyTitle')); ?>
                    </a>
                </div>
            </aside>
        </div>
    </div>
</main>
<?php endwhile; get_footer(); ?>
