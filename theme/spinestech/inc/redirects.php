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

    $uri = (string) ($_SERVER['ST_ORIGINAL_REQUEST_URI'] ?? $_SERVER['REQUEST_URI'] ?? '/');
    $path = parse_url($uri, PHP_URL_PATH) ?: '/';
    $decoded_path = rawurldecode($path);

    // Detect language prefix
    $lang = !empty($_SERVER['ST_LANG_PREFIX']) && in_array($_SERVER['ST_LANG_PREFIX'], ['ar', 'en'], true)
        ? $_SERVER['ST_LANG_PREFIX']
        : 'ar';
    $stripped_path = $decoded_path;
    if (preg_match('#^/(ar|en)(/.*)?$#i', $decoded_path, $m)) {
        $lang = strtolower($m[1]);
        $stripped_path = ($m[2] ?? '') ?: '/';
    }

    $clean_slug = trim($stripped_path, '/');

    // 1) 301 Redirects for broken inlinks, truncated slugs, or legacy relative paths
    if (str_contains($clean_slug, 'ضع-رابط') ||
        str_contains($clean_slug, 'cross-platform-أم-native') ||
        str_contains($clean_slug, '/العو') ||
        str_contains($clean_slug, 'source-code') && str_contains($clean_slug, '/')
    ) {
        $dest = function_exists('st_localized_url')
            ? st_localized_url('/articles/', $lang)
            : home_url('/' . $lang . '/articles/');
        wp_safe_redirect($dest, 301);
        exit;
    }

    // 2) Mapping table: legacy/historical slug pattern => canonical relative path
    $redirects = [
        'about-us'                           => '/about/',
        'contact-us'                         => '/contact/',
        'case-studies/privacy-policy'        => '/privacy-policy/',
        'case-studies/privacy'               => '/privacy-policy/',
        'case-studies/custom-software'       => '/services/custom-software-development/',
        'case-studies/lawyer'                => '/web-projects/lawyer/',
        'case-studies/awan-digital'          => '/web-projects/awan-digital/',
        'building-mobile-app-mvp-guide'      => '/articles/',
        'why-tech-projects-fail-pre-launch'  => '/articles/',
        'cross-platform'                     => '/articles/',
        'الفرق-بين-شركة-تطوير'               => '/articles/',
        'كم-تكلفة-تطوير-تطبيق-في-السعودية؟'  => '/articles/',
        'careers/jobs'                       => '/careers/',
        'careers/work-environment'           => '/careers/',
        'services/custom-software'           => '/services/custom-software-development/',
        'services/erp-systems'               => '/products/erp-system/',
        'articles-2'                         => '/articles/',
    ];

    foreach ($redirects as $pattern => $target) {
        if ($clean_slug === $pattern || str_starts_with($clean_slug, $pattern . '/')) {
            $dest = function_exists('st_localized_url')
                ? st_localized_url($target, $lang)
                : home_url('/' . $lang . $target);

            wp_safe_redirect($dest, 301);
            exit;
        }
    }

    // 3) Virtual Page Fallback: ensure all core theme pages always render with 200 OK
    // even if WordPress query returned 404 or page is missing from database
    $theme_pages = [
        'privacy-policy' => ['tpl' => 'page-privacy-policy.php', 'title_ar' => 'سياسة الخصوصية', 'title_en' => 'Privacy Policy'],
        'privacy'        => ['tpl' => 'page-privacy-policy.php', 'title_ar' => 'سياسة الخصوصية', 'title_en' => 'Privacy Policy'],
        'about'          => ['tpl' => 'page-about.php',          'title_ar' => 'عن الشركة',     'title_en' => 'About Us'],
        'contact'        => ['tpl' => 'page-contact.php',        'title_ar' => 'تواصل معنا',    'title_en' => 'Contact Us'],
        'articles'       => ['tpl' => 'page-articles.php',       'title_ar' => 'المقالات',      'title_en' => 'Articles'],
        'consultation'   => ['tpl' => 'page-consultation.php',   'title_ar' => 'استشارة تقنية',  'title_en' => 'Consultation'],
        'quote'          => ['tpl' => 'page-quote.php',          'title_ar' => 'طلب عرض سعر',   'title_en' => 'Request Quote'],
        'careers'        => ['tpl' => 'page-careers.php',        'title_ar' => 'الوظائف',       'title_en' => 'Careers'],
        'pricing'        => ['tpl' => 'page-pricing.php',        'title_ar' => 'الأسعار',        'title_en' => 'Pricing'],
        'solutions'      => ['tpl' => 'page-solutions.php',      'title_ar' => 'الحلول',        'title_en' => 'Solutions'],
    ];

    // Force virtual serve for privacy-policy, or rescue any core page marked 404
    $should_virtual_page = ($clean_slug === 'privacy-policy' || $clean_slug === 'privacy')
        || (is_404() && isset($theme_pages[$clean_slug]));

    if ($should_virtual_page && isset($theme_pages[$clean_slug])) {
        global $wp_query, $post;

        $info = $theme_pages[$clean_slug];
        $title = $lang === 'ar' ? $info['title_ar'] : $info['title_en'];
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
            'post_name'      => $clean_slug,
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
        $tpl = get_template_directory() . '/' . $info['tpl'];
        if (file_exists($tpl)) {
            include $tpl;
            exit;
        }
    }

    // 4) Archive Fallback: rescue archives if marked 404
    if (is_404()) {
        $archives = [
            'case-studies' => 'archive-st_case_study.php',
            'services'     => 'archive-st_service.php',
            'sectors'      => 'archive-st_sector.php',
        ];

        if (isset($archives[$clean_slug])) {
            global $wp_query;
            $wp_query->is_404               = false;
            $wp_query->is_archive           = true;
            $wp_query->is_post_type_archive = true;

            status_header(200);
            header('Content-Type: text/html; charset=UTF-8');
            $tpl = get_template_directory() . '/' . $archives[$clean_slug];
            if (file_exists($tpl)) {
                include $tpl;
                exit;
            }
        }
    }
}
