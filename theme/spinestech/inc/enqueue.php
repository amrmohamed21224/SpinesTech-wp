<?php

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

function st_theme_setup(): void
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script']);

    register_nav_menus([
        'primary' => __('Primary Menu', 'spinestech'),
    ]);
}
add_action('after_setup_theme', 'st_theme_setup');

function st_enqueue_assets(): void
{
    // Force fresh CSS on every load during development (change to theme version after launch)
    $ver = time();

    wp_enqueue_style(
        'st-fonts',
        'https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@300;400;500;600;700&family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&display=swap',
        [],
        null
    );

    wp_enqueue_style('st-main', st_asset('css/main.css'), ['st-fonts'], $ver);

    // Specific Page Styles
    $pages = [
        'about' => 'st-about',
        'contact' => 'st-contact',
        'pricing' => 'st-pricing',
        'quote' => 'st-quote',
        'consultation' => 'st-consultation',
        'solutions' => 'st-solutions',
        'careers' => 'st-careers',
        'jobs' => 'st-jobs',
    ];

    foreach ($pages as $slug => $handle) {
        // Match by page slug OR page template named page-{slug}.php
        if (is_page($slug) || is_page_template("page-{$slug}.php")) {
            wp_enqueue_style($handle, st_asset("css/pages/{$slug}.css"), ['st-main'], $ver);
        }
    }

    if (is_front_page()) {
        wp_enqueue_style('st-home', st_asset('css/pages/home.css'), ['st-main'], $ver);
        wp_enqueue_script('st-pricing-reveal', st_asset('js/pricing-reveal.js'), [], $ver, true);
    }

    if (is_post_type_archive('st_service') || is_tax('st_service_cat')) {
        wp_enqueue_style('st-services', st_asset('css/pages/services.css'), ['st-main'], $ver);

        // Three.js must load BEFORE services-hero.js (dependency)
        wp_enqueue_script(
            'st-threejs',
            'https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js',
            [],
            '128',
            true
        );

        wp_enqueue_script(
            'st-services-hero',
            st_asset('js/services-hero.js'),
            ['st-threejs'],
            $ver,
            true
        );
    }

    if (is_page('contact') || is_page_template('page-contact.php')) {
        wp_enqueue_script('st-contact-hero', st_asset('js/contact-hero.js'), [], $ver, true);
    }

    // Articles archive page
    if (is_page_template('page-articles.php')) {
        wp_enqueue_style('st-articles', st_asset('css/pages/articles.css'), ['st-main'], $ver);
        wp_enqueue_script('st-articles-js', st_asset('js/articles.js'), [], $ver, true);
    }

    // Single article page (native WP post)
    if (is_singular('post')) {
        wp_enqueue_style('st-single-article', st_asset('css/pages/single-article.css'), ['st-main'], $ver);
        wp_enqueue_script('st-articles-js', st_asset('js/articles.js'), [], $ver, true);
    }

    if (is_post_type_archive('st_product')) {
        wp_enqueue_style('st-products', st_asset('css/pages/products.css'), ['st-main'], $ver);
    }

    if (is_post_type_archive('st_sector')) {
        wp_enqueue_style('st-sectors', st_asset('css/pages/sectors.css'), ['st-main'], $ver);
    }

    if (is_post_type_archive('st_case_study')) {
        wp_enqueue_style('st-case-studies', st_asset('css/pages/case-studies.css'), ['st-main'], $ver);
    }

    if (is_singular('st_service')) {
        wp_enqueue_style('st-single-service', st_asset('css/pages/single-service.css'), ['st-main'], $ver);
    }

    if (is_singular('st_product')) {
        wp_enqueue_style('st-single-product', st_asset('css/pages/single-product.css'), ['st-main'], $ver);
    }

    if (is_singular('st_sector')) {
        wp_enqueue_style('st-single-sector', st_asset('css/pages/single-sector.css'), ['st-main'], $ver);
    }

    if (is_singular('st_case_study')) {
        wp_enqueue_style('st-single-case-study', st_asset('css/pages/single-case-study.css'), ['st-main'], $ver);
        wp_enqueue_script('st-case-study', st_asset('js/case-study.js'), [], $ver, true);
    }

    if (is_singular('st_case_study') && in_array(get_post_field('post_name', get_queried_object_id()), ['merchant', 'merchant-ecommerce', 'fashion-marketplace'], true)) {
        wp_enqueue_style('st-merchant-case-study', st_asset('css/pages/single-case-study-merchant.css'), ['st-main'], $ver);
        wp_enqueue_script('st-case-study-merchant', st_asset('js/case-study-merchant.js'), [], $ver, true);
    }

    if (is_singular('st_case_study') && in_array(get_post_field('post_name', get_queried_object_id()), ['propcare', 'propcare-360', 'property-management'], true)) {
        wp_enqueue_style('st-propcare-case-study', st_asset('css/pages/single-case-study-propcare.css'), ['st-main'], $ver);
        wp_enqueue_script('st-case-study-propcare', st_asset('js/case-study-propcare.js'), [], $ver, true);
    }

    if (is_singular('st_job')) {
        wp_enqueue_style('st-single-job', st_asset('css/pages/single-job.css'), ['st-main'], $ver);
    }

    if (is_page_template('page-work-environment.php') || is_404()) {
        wp_enqueue_style('st-work-env', st_asset('css/pages/work-environment.css'), ['st-main'], $ver);
    }

    if (is_page_template('page-articles.php') || is_home() || is_category() || is_tag() || is_author() || is_search() || is_post_type_archive('post')) {
        wp_enqueue_style('st-articles', st_asset('css/pages/articles.css'), ['st-main'], $ver);
    }

    if (is_singular('post')) {
        wp_enqueue_style('st-single-article', st_asset('css/pages/single-article.css'), ['st-main'], $ver);
    }


    wp_enqueue_script('st-navbar', st_asset('js/navbar.js'), [], $ver, true);
    wp_enqueue_script('st-accordion', st_asset('js/accordion.js'), [], $ver, true);
    wp_enqueue_script('st-forms', st_asset('js/forms.js'), [], $ver, true);
    wp_enqueue_script('st-main', st_asset('js/main.js'), ['st-navbar', 'st-accordion', 'st-forms'], $ver, true);

    if (is_singular('st_product')) {
        wp_enqueue_script('st-product', st_asset('js/product.js'), [], $ver, true);
    }

    wp_localize_script('st-main', 'stTheme', [
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'restUrl' => esc_url_raw(rest_url('spinestech/v1/')),
        'nonce' => wp_create_nonce('wp_rest'),
        'locale' => st_locale(),
        'dir' => st_dir(),
    ]);
}
add_action('wp_enqueue_scripts', 'st_enqueue_assets');

function st_body_classes(array $classes): array
{
    $classes[] = 'st-theme';
    $classes[] = 'locale-' . st_locale();
    return $classes;
}
add_filter('body_class', 'st_body_classes');