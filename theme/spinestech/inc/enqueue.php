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

/**
 * True when the request is from a phone/tablet UA.
 * Used to skip decorative JS/CSS downloads on mobile.
 */
function st_is_mobile_request(): bool
{
    return function_exists('wp_is_mobile') && wp_is_mobile();
}

/**
 * Map a page slug (Arabic original) for Polylang-translated pages.
 */
function st_is_page_slug(string $slug): bool
{
    if (is_page($slug) || is_page_template("page-{$slug}.php")) {
        return true;
    }

    if (is_page() && function_exists('pll_get_post')) {
        $ar_post_id = pll_get_post(get_the_ID(), 'ar');
        if ($ar_post_id && get_post_field('post_name', $ar_post_id) === $slug) {
            return true;
        }
    }

    $post_name = get_post_field('post_name', get_the_ID());
    if ($post_name === $slug) {
        return true;
    }

    $path  = trim((string) parse_url((string) ($_SERVER['REQUEST_URI'] ?? ''), PHP_URL_PATH), '/');
    $parts = array_values(array_filter(explode('/', $path)));
    if (!empty($parts) && in_array($parts[0], ['ar', 'en'], true)) {
        array_shift($parts);
    }
    if (($parts[0] ?? '') === $slug) {
        return true;
    }

    return false;
}

/**
 * Pages that use the shared cinematic page-hero / canvas system.
 */
function st_needs_page_hero(): bool
{
    return is_front_page()
        || st_is_page_slug('about')
        || st_is_page_slug('contact')
        || is_page_template('page-articles.php')
        || st_is_case_studies_index()
        || is_post_type_archive('st_service')
        || is_tax('st_service_cat');
}

function st_is_case_studies_index(): bool
{
    if (st_is_page_slug('case-studies')) {
        return true;
    }

    $path = trim((string) (parse_url((string) ($_SERVER['REQUEST_URI'] ?? ''), PHP_URL_PATH) ?: ''), '/');
    $parts = array_values(array_filter(explode('/', $path)));
    if (!empty($parts) && in_array($parts[0], ['ar', 'en'], true)) {
        array_shift($parts);
    }

    return ($parts[0] ?? '') === 'case-studies';
}

function st_enqueue_assets(): void
{
    $ver = wp_get_theme()->get('Version');
    $is_mobile = st_is_mobile_request();

    // Self-hosted text font (no Google Fonts render-blocking round-trips).
    wp_enqueue_style('st-fonts', st_asset('css/fonts.css'), [], $ver);
    wp_enqueue_style('st-main', st_asset('css/main.css'), ['st-fonts'], $ver);

    $navbar_themes_css = get_template_directory() . '/assets/css/components/navbar-themes.css';
    wp_enqueue_style(
        'st-navbar-themes',
        st_asset('css/components/navbar-themes.css'),
        ['st-main'],
        file_exists($navbar_themes_css) ? (string) filemtime($navbar_themes_css) : $ver
    );

    // Material Symbols — non-blocking (print → all on load).
    wp_enqueue_style(
        'st-material-symbols',
        'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&display=swap',
        [],
        null
    );

    $pages = [
        'about'          => 'st-about',
        'contact'        => 'st-contact',
        'pricing'        => 'st-pricing',
        'quote'          => 'st-quote',
        'consultation'   => 'st-consultation',
        'solutions'      => 'st-solutions',
        'careers'        => 'st-careers',
        'jobs'           => 'st-jobs',
        'privacy-policy' => 'st-privacy-policy',
    ];

    foreach ($pages as $slug => $handle) {
        if (st_is_page_slug($slug)) {
            $page_css = get_template_directory() . "/assets/css/pages/{$slug}.css";
            wp_enqueue_style(
                $handle,
                st_asset("css/pages/{$slug}.css"),
                ['st-main'],
                file_exists($page_css) ? (string) filemtime($page_css) : $ver
            );
        }
    }

    if (is_front_page()) {
        $home_css = get_template_directory() . '/assets/css/pages/home.css';
        $home_marquee_js = get_template_directory() . '/assets/js/home-cases-marquee.js';
        wp_enqueue_style(
            'st-home',
            st_asset('css/pages/home.css'),
            ['st-main'],
            file_exists($home_css) ? (string) filemtime($home_css) : $ver
        );
        wp_enqueue_script(
            'st-home-cases-marquee',
            st_asset('js/home-cases-marquee.js'),
            [],
            file_exists($home_marquee_js) ? (string) filemtime($home_marquee_js) : $ver,
            true
        );
    }

    if (is_post_type_archive('st_service') || is_tax('st_service_cat')) {
        wp_enqueue_style('st-services', st_asset('css/pages/services.css'), ['st-main'], $ver);

        // Three.js / WebGL hero — desktop only.
        if (!$is_mobile) {
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
    }

    // Articles archive — template only (do not attach via is_home() on static front pages).
    if (is_page_template('page-articles.php')) {
        $articles_css = get_template_directory() . '/assets/css/pages/articles.css';
        $articles_js  = get_template_directory() . '/assets/js/articles.js';
        wp_enqueue_style('st-articles', st_asset('css/pages/articles.css'), ['st-main'], file_exists($articles_css) ? (string) filemtime($articles_css) : $ver);
        wp_enqueue_script('st-articles-js', st_asset('js/articles.js'), [], file_exists($articles_js) ? (string) filemtime($articles_js) : $ver, true);
    }

    if (is_singular('post')) {
        $single_article_css = get_template_directory() . '/assets/css/pages/single-article.css';
        $articles_js        = get_template_directory() . '/assets/js/articles.js';
        wp_enqueue_style('st-single-article', st_asset('css/pages/single-article.css'), ['st-main'], file_exists($single_article_css) ? (string) filemtime($single_article_css) : $ver);
        wp_enqueue_script('st-articles-js', st_asset('js/articles.js'), [], file_exists($articles_js) ? (string) filemtime($articles_js) : $ver, true);
    }

    // Blog index / tax archives (not the marketing homepage).
    if (!is_front_page() && (is_home() || is_category() || is_tag() || is_author() || is_search() || is_post_type_archive('post'))) {
        wp_enqueue_style('st-articles', st_asset('css/pages/articles.css'), ['st-main'], $ver);
    }

    if (is_post_type_archive('st_product')) {
        wp_enqueue_style('st-products', st_asset('css/pages/products.css'), ['st-main'], $ver);
    }

    if (is_post_type_archive('st_sector')) {
        wp_enqueue_style('st-sectors', st_asset('css/pages/sectors.css'), ['st-main'], $ver);
    }

    if (st_is_case_studies_index()) {
        $case_studies_css = get_template_directory() . '/assets/css/pages/case-studies.css';
        wp_enqueue_style(
            'st-case-studies',
            st_asset('css/pages/case-studies.css'),
            ['st-main'],
            file_exists($case_studies_css) ? (string) filemtime($case_studies_css) : $ver
        );

        // Web Projects Spotlight section (lives inside the case studies archive).
        $webp_spotlight_css = get_template_directory() . '/assets/css/components/web-projects-spotlight.css';
        wp_enqueue_style(
            'st-web-projects-spotlight',
            st_asset('css/components/web-projects-spotlight.css'),
            ['st-main'],
            file_exists($webp_spotlight_css) ? (string) filemtime($webp_spotlight_css) : $ver
        );
        $webp_spotlight_js = get_template_directory() . '/assets/js/web-projects-spotlight.js';
        wp_enqueue_script(
            'st-web-projects-spotlight',
            st_asset('js/web-projects-spotlight.js'),
            [],
            file_exists($webp_spotlight_js) ? (string) filemtime($webp_spotlight_js) : $ver,
            true
        );
    }

    // Web Project single cinematic page.
    $path = trim((string) (parse_url((string) ($_SERVER['REQUEST_URI'] ?? ''), PHP_URL_PATH) ?: ''), '/');
    $path_parts = array_values(array_filter(explode('/', $path)));
    if (!empty($path_parts) && in_array($path_parts[0], ['ar', 'en'], true)) {
        array_shift($path_parts);
    }
    if (($path_parts[0] ?? '') === 'web-projects' && !empty($path_parts[1])) {
        $webp_page_css = get_template_directory() . '/assets/css/pages/web-project.css';
        wp_enqueue_style(
            'st-web-project',
            st_asset('css/pages/web-project.css'),
            ['st-main'],
            file_exists($webp_page_css) ? (string) filemtime($webp_page_css) : $ver
        );
    }

    if (is_singular('st_service')) {
        $single_service_css = get_template_directory() . '/assets/css/pages/single-service.css';
        wp_enqueue_style(
            'st-single-service',
            st_asset('css/pages/single-service.css'),
            ['st-main'],
            file_exists($single_service_css) ? (string) filemtime($single_service_css) : $ver
        );
    }

    if (is_singular('st_product')) {
        wp_enqueue_style('st-single-product', st_asset('css/pages/single-product.css'), ['st-main'], $ver);
        wp_enqueue_script('st-product', st_asset('js/product.js'), [], $ver, true);
    }

    if (is_singular('st_sector')) {
        wp_enqueue_style('st-single-sector', st_asset('css/pages/single-sector.css'), ['st-main'], $ver);
    }

    if (is_singular('st_case_study')) {
        wp_enqueue_style('st-single-case-study', st_asset('css/pages/single-case-study.css'), ['st-main'], $ver);
        $cs_config_css = get_template_directory() . '/assets/css/components/case-study-config.css';
        wp_enqueue_style(
            'st-case-study-config',
            st_asset('css/components/case-study-config.css'),
            ['st-main'],
            file_exists($cs_config_css) ? (string) filemtime($cs_config_css) : $ver
        );
        wp_enqueue_style('st-cs-proof', st_asset('css/components/cs-proof.css'), ['st-main'], $ver);
        wp_enqueue_script('st-case-study', st_asset('js/case-study.js'), [], $ver, true);

        $cs_slug = function_exists('st_case_study_current_slug')
            ? st_case_study_current_slug()
            : (string) get_post_field('post_name', get_the_ID());

        if (in_array($cs_slug, ['merchant', 'merchant-ecommerce', 'fashion-marketplace'], true)) {
            wp_enqueue_style('st-merchant-case-study', st_asset('css/pages/single-case-study-merchant.css'), ['st-main'], $ver);
            wp_enqueue_script('st-case-study-merchant', st_asset('js/case-study-merchant.js'), [], $ver, true);
        }

        if (in_array($cs_slug, ['propcare', 'propcare-360', 'property-management'], true)) {
            $propcare_css = get_template_directory() . '/assets/css/pages/single-case-study-propcare.css';
            wp_enqueue_style(
                'st-propcare-case-study',
                st_asset('css/pages/single-case-study-propcare.css'),
                ['st-main', 'st-navbar-themes'],
                file_exists($propcare_css) ? (string) filemtime($propcare_css) : $ver
            );
            // Parallax / decorative motion — desktop only.
            if (!$is_mobile) {
                wp_enqueue_script('st-case-study-propcare', st_asset('js/case-study-propcare.js'), [], $ver, true);
            }
        }

        if (in_array($cs_slug, ['lahza', 'lahza-events', 'event-booking'], true)) {
            wp_enqueue_style('st-lahza-case-study', st_asset('css/pages/single-case-study-lahza.css'), ['st-main'], $ver);
            wp_enqueue_script('st-case-study-lahza', st_asset('js/case-study-lahza.js'), [], $ver, true);
        }
    }

    if (is_singular('st_job')) {
        wp_enqueue_style('st-single-job', st_asset('css/pages/single-job.css'), ['st-main'], $ver);
    }

    if (is_page_template('page-work-environment.php') || is_404()) {
        wp_enqueue_style('st-work-env', st_asset('css/pages/work-environment.css'), ['st-main'], $ver);
    }

    // PropCare template fallback (when assigned directly, not only via CPT slug router).
    if (is_page_template('template-case-study-propcare.php') && !wp_style_is('st-propcare-case-study', 'enqueued')) {
        $propcare_css = get_template_directory() . '/assets/css/pages/single-case-study-propcare.css';
        wp_enqueue_style(
            'st-propcare-case-study',
            st_asset('css/pages/single-case-study-propcare.css'),
            ['st-main', 'st-navbar-themes'],
            file_exists($propcare_css) ? (string) filemtime($propcare_css) : $ver
        );
        if (!$is_mobile) {
            wp_enqueue_script('st-case-study-propcare', st_asset('js/case-study-propcare.js'), [], $ver, true);
        }
    }

    // Shared page-hero styles only where cinematic heroes exist.
    if (st_needs_page_hero()) {
        wp_enqueue_style('st-page-hero', st_asset('css/components/page-hero.css'), ['st-main'], $ver);
        if (!$is_mobile) {
            wp_enqueue_script('st-page-hero-bubbles', st_asset('js/page-hero-bubbles.js'), [], $ver, true);
        }
    }

    $analytics_js = get_template_directory() . '/assets/js/analytics-events.js';
    wp_enqueue_script(
        'st-analytics-events',
        st_asset('js/analytics-events.js'),
        [],
        file_exists($analytics_js) ? (string) filemtime($analytics_js) : $ver,
        true
    );

    wp_enqueue_script('st-loader', st_asset('js/loader.js'), [], $ver, true);
    wp_enqueue_script('st-navbar', st_asset('js/navbar.js'), [], $ver, true);
    wp_enqueue_script('st-accordion', st_asset('js/accordion.js'), [], $ver, true);
    wp_enqueue_script('st-forms', st_asset('js/forms.js'), [], $ver, true);
    wp_enqueue_script('st-footer', st_asset('js/footer.js'), [], $ver, true);
    wp_enqueue_script('st-main', st_asset('js/main.js'), ['st-navbar', 'st-accordion', 'st-forms'], $ver, true);

    // Chatbot — keep CSS render-blocking to avoid a visible unstyled window during navigation.
    wp_enqueue_style('st-chatbot', st_asset('css/components/chatbot.css'), [], $ver);
    wp_enqueue_script('st-chatbot', st_asset('js/chatbot.js'), [], $ver, true);

    wp_localize_script('st-main', 'stTheme', [
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'restUrl' => esc_url_raw(rest_url('spinestech/v1/')),
        'nonce' => wp_create_nonce('wp_rest'),
        'locale' => st_locale(),
        'dir' => st_dir(),
        'isMobile' => $is_mobile,
    ]);
}
add_action('wp_enqueue_scripts', 'st_enqueue_assets');

function st_body_classes(array $classes): array
{
    $classes[] = 'st-theme';
    $classes[] = 'locale-' . st_locale();
    if (st_is_mobile_request()) {
        $classes[] = 'is-mobile';
    }
    return $classes;
}
add_filter('body_class', 'st_body_classes');

add_action('wp_head', function (): void {
    if (is_admin() || !is_admin_bar_showing()) {
        return;
    }

    echo '<style id="st-admin-bar-layout-fix">html,body{margin-top:0!important;padding-top:0!important}#wpadminbar{display:none!important}body.admin-bar .navbar{top:0!important;inset-block-start:0!important}</style>' . "\n";
}, 999);

/**
 * Defer theme scripts to keep them off the critical path.
 */
function st_defer_scripts(string $tag, string $handle): string
{
    if (strpos($handle, 'jquery') !== false || strpos($tag, 'defer') !== false || strpos($tag, 'async') !== false) {
        return $tag;
    }

    if (strpos($handle, 'st-') === 0) {
        // Chatbot waits until window load / idle — mark as defer; JS itself also gates on load.
        return str_replace(' src', ' defer="defer" src', $tag);
    }

    if ($handle === 'st-threejs') {
        return str_replace(' src', ' defer="defer" src', $tag);
    }

    return $tag;
}
add_filter('script_loader_tag', 'st_defer_scripts', 10, 2);

/**
 * Make selected stylesheets non-render-blocking.
 */
function st_async_styles(string $html, string $handle, string $href, string $media): string
{
    $async_handles = ['st-material-symbols'];
    if (function_exists('st_is_mobile_request') && st_is_mobile_request()) {
        $async_handles[] = 'st-chatbot';
    }

    if (!in_array($handle, $async_handles, true)) {
        return $html;
    }

    $href_esc = esc_url($href);
    return '<link rel="stylesheet" id="' . esc_attr($handle) . '-css" href="' . $href_esc . '" media="print" onload="this.media=\'all\'">' .
        '<noscript><link rel="stylesheet" href="' . $href_esc . '"></noscript>';
}
add_filter('style_loader_tag', 'st_async_styles', 10, 4);

/**
 * Preload the primary text font file used above the fold (weight 700 for titles).
 */
function st_preload_primary_font(): void
{
    if (is_admin()) {
        return;
    }
    $href = esc_url(st_asset('fonts/ibm-plex-sans-arabic-700.woff2'));
    echo '<link rel="preload" href="' . $href . '" as="font" type="font/woff2" crossorigin>' . "\n";
}
add_action('wp_head', 'st_preload_primary_font', 1);

/**
 * Attempt to dequeue known non-theme render-blocking assets when unused on front.
 * subscription.css comes from a block/plugin outside this theme.
 */
function st_dequeue_unused_front_assets(): void
{
    if (!is_front_page()) {
        return;
    }

    // Common newsletter/subscription block handles — safe no-ops if unregistered.
    wp_dequeue_style('wp-block-library-theme');
    foreach (['subscription', 'st-subscription', 'mailpoet-public', 'newsletter'] as $handle) {
        wp_dequeue_style($handle);
    }
}
add_action('wp_enqueue_scripts', 'st_dequeue_unused_front_assets', 100);
