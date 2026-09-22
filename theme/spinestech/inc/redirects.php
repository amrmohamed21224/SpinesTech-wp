<?php
declare(strict_types=1);

/**
 * 301 Permanent Redirects Router.
 * Resolves historical/legacy URL slugs to canonical targets to eliminate 404 errors.
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action('template_redirect', 'st_handle_legacy_redirects', 1);

function st_handle_legacy_redirects(): void
{
    if (is_admin() || wp_doing_ajax()) {
        return;
    }

    $uri = (string) ($_SERVER['REQUEST_URI'] ?? '/');
    $path = parse_url($uri, PHP_URL_PATH) ?: '/';
    $decoded_path = rawurldecode($path);

    // Explicitly redirect /ar and /ar/ to the root homepage
    // We do NOT redirect /en/ because the English homepage needs to return 200 OK for SEO hreflang.
    if (preg_match('#^/ar/?$#i', $decoded_path)) {
        wp_safe_redirect(home_url('/'), 301);
        exit;
    }

    // Detect language prefix
    $lang = 'ar';
    $stripped_path = $decoded_path;
    if (preg_match('#^/(ar|en)(/.*)?$#i', $decoded_path, $m)) {
        $lang = strtolower($m[1]);
        $stripped_path = $m[2] ?? '/';
    }

    $clean_slug = trim($stripped_path, '/');

    // 1) Virtual handler for Privacy Policy (serves template directly with 200 OK)
    if ($clean_slug === 'privacy-policy' || $clean_slug === 'privacy') {
        global $wp_query, $post;

        $title = $lang === 'ar' ? 'سياسة الخصوصية' : 'Privacy Policy';
        $virtual = new WP_Post((object) [
            'ID'             => 0,
            'post_author'    => 1,
            'post_date'      => current_time('mysql'),
            'post_date_gmt'  => current_time('mysql', 1),
            'post_content'   => '',
            'post_title'     => $title,
            'post_excerpt'   => '',
            'post_status'    => 'publish',
            'comment_status' => 'closed',
            'ping_status'    => 'closed',
            'post_name'      => 'privacy-policy',
            'post_type'      => 'page',
            'filter'         => 'raw',
        ]);

        $post                          = $virtual;
        $wp_query->post                = $virtual;
        $wp_query->posts               = [$virtual];
        $wp_query->post_count          = 1;
        $wp_query->found_posts         = 1;
        $wp_query->max_num_pages       = 1;
        $wp_query->is_404              = false;
        $wp_query->is_singular         = true;
        $wp_query->is_single           = false;
        $wp_query->is_page             = true;
        $wp_query->is_archive          = false;
        $wp_query->is_home             = false;
        $wp_query->queried_object      = $virtual;
        $wp_query->queried_object_id   = 0;

        status_header(200);
        header('Content-Type: text/html; charset=UTF-8');
        $tpl = get_template_directory() . '/page-privacy-policy.php';
        if (file_exists($tpl)) {
            include $tpl;
            exit;
        }
    }

    // 2) Mapping table: legacy slug pattern / substring => canonical relative path
    $redirects = [
        'case-studies/privacy-policy' => '/privacy-policy/',
        'case-studies/privacy'        => '/privacy-policy/',
        'case-studies/custom-software' => '/services/custom-software-development/',
        'case-studies/lawyer' => '/web-projects/lawyer/',
        'case-studies/awan-digital' => '/web-projects/awan-digital/',
        'building-mobile-app-mvp-guide' => '/articles/',
        'why-tech-projects-fail-pre-launch' => '/articles/',
        'flutter-vs-native' => '/articles/',
        'cross-platform' => '/articles/',
        'الفرق-بين-شركة-تطوير' => '/articles/',
        'كم-تكلفة-تطوير-تطبيق' => '/articles/',
        'تكلفة-تطوير-تطبيق' => '/articles/',
        'وثيقة-متطلبات-لمشروعك' => '/articles/',
        'لو-كتب-الذكاء-الاصطناعي' => '/articles/',
        'بعد-تطوير-التطبيق' => '/articles/',
        'articles-2' => '/articles/',
        'saudi-app-launch-requirements' => '/articles/',
        'mobile-app-development-cost' => '/articles/',
    ];

    foreach ($redirects as $pattern => $target) {
        if ($clean_slug === $pattern || str_contains($clean_slug, $pattern)) {
            $dest = function_exists('st_localized_url')
                ? st_localized_url($target, $lang)
                : home_url('/' . $lang . $target);

            wp_safe_redirect($dest, 301);
            exit;
        }
    }
}
