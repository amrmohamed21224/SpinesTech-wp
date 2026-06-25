<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="<?php echo esc_attr(st_dir()); ?>">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo esc_url(st_asset('images/brand/icon.png')); ?>" type="image/png">
    <?php wp_head(); ?>
</head>
<body <?php body_class('min-h-screen bg-background text-on-surface antialiased'); ?>>
<?php wp_body_open(); ?>
<?php get_template_part('template-parts/navbar'); ?>
<main id="main-content">
