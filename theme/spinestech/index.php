<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article <?php post_class('py-24 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto'); ?>>
        <h1 class="text-headline-xl font-bold mb-6"><?php the_title(); ?></h1>
        <div class="prose max-w-none text-on-surface-variant"><?php the_content(); ?></div>
    </article>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
