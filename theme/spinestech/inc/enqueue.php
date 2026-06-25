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
    $ver = wp_get_theme()->get('Version');

    wp_enqueue_style(
        'st-fonts',
        'https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@300;400;500;600;700&family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&display=swap',
        [],
        null
    );

    wp_enqueue_style('st-main', st_asset('css/main.css'), ['st-fonts'], $ver);

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
