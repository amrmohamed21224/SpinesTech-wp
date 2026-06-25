<?php get_header(); ?>
<main class="pt-24 sm:pt-28 lg:pt-32 pb-20 px-margin-mobile md:px-margin-desktop text-start">
    <div class="max-w-container-max mx-auto">
        <?php while (have_posts()) : the_post(); ?>
            <h1 class="text-headline-xl font-bold text-primary mb-8"><?php the_title(); ?></h1>
            <div class="prose max-w-none text-on-surface-variant"><?php the_content(); ?></div>
        <?php endwhile; ?>
    </div>
</main>
<?php get_footer(); ?>
