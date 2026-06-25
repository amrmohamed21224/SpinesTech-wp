<?php
/**
 * Template Name: About
 */
get_header();
?>
<main class="pt-24 sm:pt-28 lg:pt-32 pb-20 px-margin-mobile md:px-margin-desktop text-start">
    <div class="max-w-container-max mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-20">
        <div>
            <span class="text-secondary font-bold text-label-md uppercase tracking-widest mb-4 block"><?php echo esc_html(st_t('home.aboutBadge')); ?></span>
            <h1 class="text-display-lg-mobile md:text-display-lg text-primary font-bold mb-6"><?php echo esc_html(st_t('nav.about')); ?></h1>
            <p class="text-body-lg text-on-surface-variant"><?php echo esc_html(st_t('home.visionText')); ?></p>
        </div>
        <img src="<?php echo esc_url(st_asset('images/about/hero.png')); ?>" alt="" class="rounded-3xl shadow-2xl w-full object-cover">
    </div>
    <?php while (have_posts()) : the_post(); if (get_the_content()) : ?>
        <div class="max-w-container-max mx-auto prose max-w-none"><?php the_content(); ?></div>
    <?php endif; endwhile; ?>
</main>
<?php get_footer(); ?>
