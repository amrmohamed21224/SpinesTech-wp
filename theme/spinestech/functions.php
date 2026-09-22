<?php

/**
 * Theme Name: SpinesTech
 * Theme URI: https://spinestech.com
 * Author: SpinesTech
 * Description: Custom WordPress theme for SpinesTech â€” matches the React design 1:1.
 * Version: 1.0.0
 * Requires at least: 6.0
 * Requires PHP: 8.0
 * Text Domain: spinestech
 */

if (!defined('ABSPATH')) {
    exit;
}

define('ST_THEME_VERSION', '1.0.0');

require_once get_template_directory() . '/inc/i18n.php';
require_once get_template_directory() . '/inc/site-config.php';
require_once get_template_directory() . '/inc/encoding.php';
require_once get_template_directory() . '/inc/queries.php';
require_once get_template_directory() . '/inc/template-tags.php';
require_once get_template_directory() . '/inc/case-study-meta.php';
require_once get_template_directory() . '/inc/case-study-config.php';
require_once get_template_directory() . '/inc/case-study-seo.php';
require_once get_template_directory() . '/inc/navbar-theme.php';
require_once get_template_directory() . '/inc/service-landings.php';
require_once get_template_directory() . '/inc/article-landings.php';
require_once get_template_directory() . '/inc/internal-links.php';
require_once get_template_directory() . '/inc/service-bootstrap.php';
require_once get_template_directory() . '/inc/article-bootstrap.php';
require_once get_template_directory() . '/inc/case-study-router.php';
require_once get_template_directory() . '/inc/web-projects-config.php';
require_once get_template_directory() . '/inc/web-projects-router.php';
require_once get_template_directory() . '/inc/redirects.php';
require_once get_template_directory() . '/inc/seo.php';
require_once get_template_directory() . '/inc/enqueue.php';
require get_template_directory() . '/inc/rest-forms.php';

// Intercept the request to strip language prefixes so WordPress doesn't throw 404s for /en/* paths
add_action('parse_request', function ($wp) {
    if (is_admin()) {
        return;
    }
    if (isset($wp->request) && preg_match('#^(ar|en)(?:/+(.*))?$#i', (string) $wp->request, $matches)) {
        $wp->request = $matches[2] ?? '';
    }
});

add_filter('template_include', function ($template) {
    if (is_page()) {
        $post_id = get_the_ID();
        $slug = get_post_field('post_name', $post_id);

        // Polylang Support: If this is an English page, find the slug of the Arabic original
        // so that we can load the correct hardcoded template (e.g. page-about.php)
        if (function_exists('pll_get_post')) {
            $ar_post_id = pll_get_post($post_id, 'ar');
            if ($ar_post_id && $ar_post_id !== $post_id) {
                $slug = get_post_field('post_name', $ar_post_id);
            }
        }

        $custom = get_template_directory() . "/page-{$slug}.php";
        if (file_exists($custom)) {
            return $custom;
        }
    }
    return $template;
});

// Force HTML lang attribute to match our cookie-based locale (front-end only)
add_filter('language_attributes', function($output) {
    // Don't touch wp-admin â€” let WordPress handle it with the user's own profile language
    if (is_admin()) {
        return $output;
    }
    $locale = function_exists('st_locale') ? st_locale() : 'ar';
    $dir    = $locale === 'ar' ? 'rtl' : 'ltr';
    $lang   = $locale === 'ar' ? 'ar'  : 'en-US';
    return 'lang="' . esc_attr($lang) . '" dir="' . esc_attr($dir) . '"';
});

add_action('template_redirect', function () {
    if (is_admin()) {
        return;
    }

    if (isset($_GET['lang']) && in_array($_GET['lang'], ['ar', 'en'], true)) {
        $lang = $_GET['lang'];
        $path = function_exists('st_current_canonical_path') ? st_current_canonical_path() : '/';
        $target = function_exists('st_localized_url') ? st_localized_url($path, $lang) : home_url('/' . $lang . '/');
        setcookie('st_lang', $lang, time() + YEAR_IN_SECONDS, COOKIEPATH, COOKIE_DOMAIN, is_ssl(), true);
        wp_safe_redirect($target, 302);
        exit;
    }

    $path = parse_url((string) ($_SERVER['REQUEST_URI'] ?? ''), PHP_URL_PATH) ?: '';
    if (preg_match('#^/(ar|en)(/|$)#', $path, $lang_match)) {
        $lang = $lang_match[1];
        if (($_COOKIE['st_lang'] ?? '') !== $lang) {
            setcookie('st_lang', $lang, time() + YEAR_IN_SECONDS, COOKIEPATH, COOKIE_DOMAIN, is_ssl(), true);
        }
    }

    // Redirect old query parameters to clean URLs
    if (strpos($path, '/articles/') !== false && isset($_GET['articles_page'])) {
        $page = max(1, (int) $_GET['articles_page']);
        if ($page > 1) {
            $locale = (function_exists('st_locale') ? st_locale() : 'ar');
            $prefix = $locale === 'ar' ? '' : '/' . $locale;
            $target = home_url($prefix . '/articles/page/' . $page . '/');
            wp_safe_redirect($target, 301);
            exit;
        }
    }
}, -1);
