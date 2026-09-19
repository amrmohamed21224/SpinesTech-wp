<?php
/**
 * Adaptive navbar themes — bar colours follow each page's palette.
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Brand accent palettes keyed by internal brand id.
 *
 * @return array<string, array{accent:string, bright:string, soft:string, glow:string}>
 */
function st_navbar_brand_palettes(): array
{
    return [
        'articles' => [
            'accent' => '#036d36',
            'bright' => '#1fae62',
            'soft'   => 'rgba(3, 109, 54, 0.11)',
            'glow'   => 'rgba(3, 109, 54, 0.26)',
        ],
        'backway' => [
            'accent' => '#ff5722',
            'bright' => '#ff8a4c',
            'soft'   => 'rgba(255, 87, 34, 0.12)',
            'glow'   => 'rgba(255, 87, 34, 0.28)',
        ],
        'merchant' => [
            'accent' => '#006765',
            'bright' => '#008f8c',
            'soft'   => 'rgba(0, 103, 101, 0.12)',
            'glow'   => 'rgba(0, 103, 101, 0.26)',
        ],
        'propcare' => [
            'accent' => '#00668a',
            'bright' => '#86d2fd',
            'soft'   => 'rgba(0, 102, 138, 0.11)',
            'glow'   => 'rgba(0, 102, 138, 0.24)',
        ],
        'lahza' => [
            'accent' => '#81498a',
            'bright' => '#b56fc0',
            'soft'   => 'rgba(129, 73, 138, 0.11)',
            'glow'   => 'rgba(129, 73, 138, 0.24)',
        ],
    ];
}

/**
 * Map a case-study slug to a navbar brand id.
 */
function st_navbar_case_study_brand(string $slug): string
{
    if (in_array($slug, ['merchant', 'merchant-ecommerce', 'fashion-marketplace'], true)) {
        return 'merchant';
    }
    if (in_array($slug, ['propcare', 'propcare-360', 'property-management'], true)) {
        return 'propcare';
    }
    if (in_array($slug, ['lahza', 'lahza-events', 'event-booking'], true)) {
        return 'lahza';
    }

    return 'backway';
}

/**
 * @param array<int, string> $templates
 */
function st_is_any_page_template(array $templates): bool
{
    foreach ($templates as $template) {
        if (is_page_template($template)) {
            return true;
        }
    }

    return false;
}

/**
 * True when the current view is a premium case-study layout page.
 */
function st_is_case_study_light_page(): bool
{
    if (is_singular('st_case_study')) {
        return true;
    }

    return st_is_any_page_template([
        'template-case-study-propcare.php',
        'template-case-study-merchant.php',
        'template-case-study-lahza.php',
        'page-merchant-case-study.php',
    ]);
}

/**
 * Resolve brand id for the active case-study layout.
 */
function st_navbar_active_case_study_brand(): string
{
    if (is_page_template('template-case-study-propcare.php')) {
        return 'propcare';
    }
    if (st_is_any_page_template(['template-case-study-merchant.php', 'page-merchant-case-study.php'])) {
        return 'merchant';
    }
    if (is_page_template('template-case-study-lahza.php')) {
        return 'lahza';
    }

    if (is_singular('st_case_study')) {
        return st_navbar_case_study_brand((string) get_post_field('post_name', get_the_ID()));
    }

    return 'backway';
}

/**
 * Resolved navbar theme for the current request.
 *
 * @return array{theme:string, brand:string, accent:string, bright:string, soft:string, glow:string}
 */
function st_navbar_theme_config(): array
{
    $palettes = st_navbar_brand_palettes();
    $dark = [
        'theme'  => 'dark',
        'brand'  => '',
        'accent' => '#036d36',
        'bright' => '#0f9a52',
        'soft'   => 'rgba(3, 109, 54, 0.12)',
        'glow'   => 'rgba(3, 109, 54, 0.28)',
    ];

    if (is_singular('post')) {
        $articles = $palettes['articles'];
        return [
            'theme'  => 'light',
            'brand'  => 'articles',
            'accent' => $articles['accent'],
            'bright' => $articles['bright'],
            'soft'   => $articles['soft'],
            'glow'   => $articles['glow'],
        ];
    }

    if (is_page_template('page-merchant-case-study.php')) {
        $merchant = $palettes['merchant'];
        return [
            'theme'  => 'light',
            'brand'  => 'merchant',
            'accent' => $merchant['accent'],
            'bright' => $merchant['bright'],
            'soft'   => $merchant['soft'],
            'glow'   => $merchant['glow'],
        ];
    }

    if (st_is_case_study_light_page()) {
        $brand   = st_navbar_active_case_study_brand();
        $palette = $palettes[$brand] ?? $palettes['backway'];

        return [
            'theme'  => 'light',
            'brand'  => $brand,
            'accent' => $palette['accent'],
            'bright' => $palette['bright'],
            'soft'   => $palette['soft'],
            'glow'   => $palette['glow'],
        ];
    }

    return $dark;
}

/**
 * @param array<int, string> $classes
 * @return array<int, string>
 */
function st_navbar_theme_body_classes(array $classes): array
{
    $config = st_navbar_theme_config();
    $classes[] = 'navbar-theme-' . $config['theme'];

    if ($config['brand'] !== '') {
        $classes[] = 'navbar-brand-' . sanitize_html_class($config['brand']);
    }

    return $classes;
}
add_filter('body_class', 'st_navbar_theme_body_classes', 20);

/**
 * Inject page accent tokens for the light navbar theme.
 */
function st_navbar_theme_inline_css(): void
{
    $config = st_navbar_theme_config();
    if ($config['theme'] !== 'light') {
        return;
    }

    $css = sprintf(
        ':root{--stn-page-accent:%1$s;--stn-page-accent-bright:%2$s;--stn-page-accent-soft:%3$s;--stn-page-accent-glow:%4$s;}',
        $config['accent'],
        $config['bright'],
        $config['soft'],
        $config['glow']
    );

    wp_add_inline_style('st-navbar-themes', $css);
}
add_action('wp_enqueue_scripts', 'st_navbar_theme_inline_css', 30);

/**
 * PropCare hero clearance — always wins over legacy negative-margin rules.
 */
function st_propcare_hero_clearance_inline_css(): void
{
    if (!is_singular('st_case_study') && !is_page_template('template-case-study-propcare.php')) {
        return;
    }

    if (st_navbar_active_case_study_brand() !== 'propcare') {
        return;
    }

    $css = 'main.pc>.pc__hero:first-child,#hero.pc__hero{margin-block-start:0!important;padding-top:calc(var(--navbar-height,5.125rem)+clamp(2.75rem,5vw,4rem))!important;padding-bottom:clamp(2.9rem,8vw,5.5rem)!important}.pc__hero-inner{align-items:start!important}@media(max-width:767px){main.pc>.pc__hero:first-child,#hero.pc__hero{padding-top:calc(var(--navbar-height,5.125rem)+1.75rem)!important}}';

    wp_add_inline_style('st-navbar-themes', $css);
}
add_action('wp_enqueue_scripts', 'st_propcare_hero_clearance_inline_css', 35);
