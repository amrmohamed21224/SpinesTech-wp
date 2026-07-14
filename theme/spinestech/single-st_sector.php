<?php get_header(); while (have_posts()) : the_post(); ?>
<main class="pt-24 sm:pt-28 lg:pt-32 pb-20 px-margin-mobile md:px-margin-desktop text-start">
    <div class="max-w-container-max mx-auto">
        <h1 class="text-headline-xl font-bold text-primary mb-4"><?php the_title(); ?></h1>
        <p class="text-body-lg text-on-surface-variant mb-8"><?php echo esc_html(get_the_excerpt()); ?></p>
        <div class="prose max-w-none"><?php the_content(); ?></div>
    </div>
</main>
<?php endwhile; get_footer(); ?>
