<?php get_header(); while (have_posts()) : the_post(); ?>
<main class="single-sector">
    <div class="container">
        <header class="single-sector__header">
            <h1 class="single-sector__title"><?php the_title(); ?></h1>
            <p class="single-sector__excerpt"><?php echo esc_html(get_the_excerpt()); ?></p>
        </header>
        <div class="single-sector__content prose">
            <?php the_content(); ?>
        </div>
    </div>
</main>
<?php endwhile; get_footer(); ?>
