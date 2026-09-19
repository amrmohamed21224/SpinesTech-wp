<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="<?php echo esc_attr(st_dir()); ?>">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo esc_url(st_asset('images/brand/icon-64.png')); ?>" type="image/png">
    <?php
    // CDN preconnect only when Three.js will actually load (services archive, desktop).
    if ((is_post_type_archive('st_service') || is_tax('st_service_cat')) && !(function_exists('wp_is_mobile') && wp_is_mobile())) :
    ?>
    <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
    <?php endif; ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class('st-body'); ?>>
<?php wp_body_open(); ?>
<?php get_template_part('template-parts/loader'); ?>
<?php get_template_part('template-parts/navbar'); ?>
