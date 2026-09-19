<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

/** @var string|null */
$GLOBALS['st_seo_page_description'] = null;

function st_seo_set_description(string $description): void
{
    $GLOBALS['st_seo_page_description'] = wp_strip_all_tags($description);
}

function st_seo_current_url(?string $locale = null): string
{
    $path = function_exists('st_current_canonical_path') ? st_current_canonical_path() : '/';
    return function_exists('st_localized_url') ? st_localized_url($path, $locale ?: st_locale()) : home_url($path);
}

function st_seo_description(): string
{
    if (!empty($GLOBALS['st_seo_page_description'])) {
        return (string) $GLOBALS['st_seo_page_description'];
    }

    $filtered = apply_filters('st_seo_description', '');
    if (is_string($filtered) && $filtered !== '') {
        return $filtered;
    }

    $locale = function_exists('st_locale') ? st_locale() : 'ar';

    if (is_singular()) {
        $excerpt = trim((string) get_the_excerpt());
        if ($excerpt !== '') {
            return wp_strip_all_tags($excerpt);
        }
    }

    if (function_exists('st_entity_description')) {
        return st_entity_description($locale);
    }

    return $locale === 'ar'
        ? 'SpinesTech شركة تطوير برمجيات للشركات في الخليج.'
        : 'SpinesTech builds custom software for companies in the GCC.';
}

function st_seo_image(): string
{
    if (is_singular() && has_post_thumbnail()) {
        $image = get_the_post_thumbnail_url(get_the_ID(), 'full');
        if ($image) {
            return $image;
        }
    }

    return function_exists('st_asset')
        ? st_asset('images/brand/icon.png')
        : get_template_directory_uri() . '/assets/images/brand/icon.png';
}

function st_seo_og_type(): string
{
    if (is_singular('post')) {
        return 'article';
    }
    if (is_singular()) {
        return 'website';
    }
    return 'website';
}

function st_seo_robots_content(): string
{
    if (is_404() || is_search()) {
        return 'noindex, follow';
    }
    return 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1';
}

function st_seo_print_meta(): void
{
    if (is_admin()) {
        return;
    }

    $locale = function_exists('st_locale') ? st_locale() : 'ar';
    $is_ar = $locale === 'ar';
    $canonical = st_seo_current_url($locale);
    $alternate_ar = st_seo_current_url('ar');
    $alternate_en = st_seo_current_url('en');
    $title = wp_get_document_title();
    $description = st_seo_description();
    $image = st_seo_image();
    $site_name = get_bloginfo('name') ?: 'SpinesTech';
    $type = st_seo_og_type();
    ?>
    <meta name="description" content="<?php echo esc_attr($description); ?>">
    <link rel="canonical" href="<?php echo esc_url($canonical); ?>">
    <link rel="alternate" hreflang="ar" href="<?php echo esc_url($alternate_ar); ?>">
    <link rel="alternate" hreflang="en" href="<?php echo esc_url($alternate_en); ?>">
    <link rel="alternate" hreflang="x-default" href="<?php echo esc_url($alternate_ar); ?>">
    <meta name="robots" content="<?php echo esc_attr(st_seo_robots_content()); ?>">
    <meta property="og:locale" content="<?php echo esc_attr($is_ar ? 'ar_AR' : 'en_US'); ?>">
    <meta property="og:locale:alternate" content="<?php echo esc_attr($is_ar ? 'en_US' : 'ar_AR'); ?>">
    <meta property="og:type" content="<?php echo esc_attr($type); ?>">
    <meta property="og:site_name" content="<?php echo esc_attr($site_name); ?>">
    <meta property="og:title" content="<?php echo esc_attr($title); ?>">
    <meta property="og:description" content="<?php echo esc_attr($description); ?>">
    <meta property="og:url" content="<?php echo esc_url($canonical); ?>">
    <meta property="og:image" content="<?php echo esc_url($image); ?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo esc_attr($title); ?>">
    <meta name="twitter:description" content="<?php echo esc_attr($description); ?>">
    <meta name="twitter:image" content="<?php echo esc_url($image); ?>">
    <?php
}
add_action('wp_head', 'st_seo_print_meta', 4);

function st_seo_breadcrumb_items(): array
{
    $locale = function_exists('st_locale') ? st_locale() : 'ar';
    $is_rtl = $locale === 'ar';
    $items = [
        [
            '@type' => 'ListItem',
            'position' => 1,
            'name' => $is_rtl ? 'الرئيسية' : 'Home',
            'item' => st_seo_current_url($locale),
        ],
    ];

    if (is_post_type_archive('st_service') || is_singular('st_service')) {
        $items[] = [
            '@type' => 'ListItem',
            'position' => 2,
            'name' => $is_rtl ? 'الخدمات' : 'Services',
            'item' => get_post_type_archive_link('st_service') ?: st_url('/services/'),
        ];
        if (is_singular('st_service')) {
            $items[] = [
                '@type' => 'ListItem',
                'position' => 3,
                'name' => get_the_title(),
                'item' => st_seo_current_url($locale),
            ];
        }
    } elseif (is_post_type_archive('st_case_study') || is_singular('st_case_study')) {
        $items[] = [
            '@type' => 'ListItem',
            'position' => 2,
            'name' => $is_rtl ? 'دراسات الحالة' : 'Case Studies',
            'item' => get_post_type_archive_link('st_case_study') ?: st_url('/case-studies/'),
        ];
        if (is_singular('st_case_study')) {
            $items[] = [
                '@type' => 'ListItem',
                'position' => 3,
                'name' => get_the_title(),
                'item' => st_seo_current_url($locale),
            ];
        }
    } elseif (is_singular('post')) {
        $items[] = [
            '@type' => 'ListItem',
            'position' => 2,
            'name' => $is_rtl ? 'المقالات' : 'Articles',
            'item' => function_exists('st_articles_page_url') ? st_articles_page_url() : st_url('/articles/'),
        ];
        $items[] = [
            '@type' => 'ListItem',
            'position' => 3,
            'name' => get_the_title(),
            'item' => st_seo_current_url($locale),
        ];
    }

    return $items;
}

function st_seo_faq_entities(): array
{
    if (!function_exists('st_service_faq_for_slug') || !is_singular('st_service')) {
        return [];
    }

    $slug = get_post_field('post_name', get_the_ID());
    $faq = st_service_faq_for_slug((string) $slug);
    if (empty($faq)) {
        return [];
    }

    $entities = [];
    foreach ($faq as $row) {
        $q = $row['q'] ?? '';
        $a = $row['a'] ?? '';
        if ($q === '' || $a === '') {
            continue;
        }
        $entities[] = [
            '@type' => 'Question',
            'name' => $q,
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => $a,
            ],
        ];
    }
    return $entities;
}

function st_seo_print_json_ld(): void
{
    if (is_admin()) {
        return;
    }

    $locale = function_exists('st_locale') ? st_locale() : 'ar';
    $home_ar = st_seo_current_url('ar');
    $home_en = st_seo_current_url('en');
    $logo = function_exists('st_asset') ? st_asset('images/brand/icon.png') : get_template_directory_uri() . '/assets/images/brand/icon.png';
    $org_id = home_url('/#organization');
    $website_id = home_url('/#website');

    $graph = [
        [
            '@type' => 'Organization',
            '@id' => $org_id,
            'name' => 'SpinesTech',
            'url' => $locale === 'ar' ? $home_ar : $home_en,
            'description' => function_exists('st_entity_description') ? st_entity_description($locale) : '',
            'logo' => ['@type' => 'ImageObject', 'url' => $logo],
            'sameAs' => function_exists('st_organization_same_as') ? st_organization_same_as() : [],
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'contactType' => 'sales',
                'email' => 'admin@spinestech.com',
                'availableLanguage' => ['Arabic', 'English'],
                'areaServed' => ['SA', 'AE', 'KW', 'BH', 'OM', 'QA', 'EG'],
            ],
        ],
        [
            '@type' => 'WebSite',
            '@id' => $website_id,
            'url' => $locale === 'ar' ? $home_ar : $home_en,
            'name' => 'SpinesTech',
            'publisher' => ['@id' => $org_id],
            'inLanguage' => $locale === 'ar' ? 'ar' : 'en-US',
        ],
    ];

    if (is_front_page()) {
        $graph[1]['potentialAction'] = [
            '@type' => 'SearchAction',
            'target' => st_url('/articles/') . '?s={search_term_string}',
            'query-input' => 'required name=search_term_string',
        ];
    }

    if (is_page_template('page-about.php') || (is_page() && get_post_field('post_name') === 'about')) {
        $graph[] = [
            '@type' => 'AboutPage',
            '@id' => st_seo_current_url($locale) . '#aboutpage',
            'url' => st_seo_current_url($locale),
            'name' => wp_get_document_title(),
            'description' => st_seo_description(),
            'isPartOf' => ['@id' => $website_id],
            'about' => ['@id' => $org_id],
        ];
    }

    if (is_page_template('page-contact.php') || (is_page() && get_post_field('post_name') === 'contact')) {
        $graph[] = [
            '@type' => 'ContactPage',
            '@id' => st_seo_current_url($locale) . '#contactpage',
            'url' => st_seo_current_url($locale),
            'name' => wp_get_document_title(),
            'description' => st_seo_description(),
            'isPartOf' => ['@id' => $website_id],
        ];
    }

    if (is_singular('st_service')) {
        $graph[] = [
            '@type' => 'Service',
            '@id' => st_seo_current_url($locale) . '#service',
            'name' => get_the_title(),
            'description' => st_seo_description(),
            'provider' => ['@id' => $org_id],
            'areaServed' => [
                '@type' => 'Place',
                'name' => 'GCC',
            ],
            'url' => st_seo_current_url($locale),
        ];
    }

    if (is_singular('post')) {
        $post_id = get_the_ID();
        $graph[] = [
            '@type' => 'BlogPosting',
            '@id' => st_seo_current_url($locale) . '#article',
            'headline' => get_the_title(),
            'description' => st_seo_description(),
            'datePublished' => get_the_date('c', $post_id),
            'dateModified' => get_the_modified_date('c', $post_id),
            'author' => [
                '@type' => 'Organization',
                'name' => 'SpinesTech Engineering',
            ],
            'publisher' => ['@id' => $org_id],
            'mainEntityOfPage' => st_seo_current_url($locale),
            'inLanguage' => $locale === 'ar' ? 'ar' : 'en-US',
        ];
    }

    if (is_singular('st_case_study')) {
        $graph[] = [
            '@type' => 'CreativeWork',
            '@id' => st_seo_current_url($locale) . '#casestudy',
            'name' => get_the_title(),
            'description' => st_seo_description(),
            'creator' => ['@id' => $org_id],
            'url' => st_seo_current_url($locale),
        ];
    }

    if (!is_front_page()) {
        $breadcrumbs = st_seo_breadcrumb_items();
        if (count($breadcrumbs) > 1) {
            $graph[] = [
                '@type' => 'BreadcrumbList',
                'itemListElement' => $breadcrumbs,
            ];
        }
    }

    $faq_entities = st_seo_faq_entities();
    if (!empty($faq_entities)) {
        $graph[] = [
            '@type' => 'FAQPage',
            'mainEntity' => $faq_entities,
        ];
    }

    if (is_singular() && !is_singular('post') && !is_singular('st_service') && !is_singular('st_case_study')) {
        $graph[] = [
            '@type' => 'WebPage',
            '@id' => st_seo_current_url($locale) . '#webpage',
            'url' => st_seo_current_url($locale),
            'name' => wp_get_document_title(),
            'description' => st_seo_description(),
            'isPartOf' => ['@id' => $website_id],
            'inLanguage' => $locale === 'ar' ? 'ar' : 'en-US',
        ];
    }

    $schema = ['@context' => 'https://schema.org', '@graph' => $graph];
    echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>' . "\n";
}
add_action('wp_head', 'st_seo_print_json_ld', 30);

add_filter('robots_txt', function (string $output, bool $public): string {
    $lines = array_filter(array_map('trim', explode("\n", $output)));
    $lines[] = 'Sitemap: ' . home_url('/wp-sitemap.xml');
    return implode("\n", array_unique($lines)) . "\n";
}, 10, 2);

add_filter('pre_get_document_title', function (string $title): string {
    if (is_404()) {
        return st_locale() === 'ar' ? 'الصفحة غير موجودة | SpinesTech' : 'Page Not Found | SpinesTech';
    }
    return $title;
}, 5);

add_action('template_redirect', function (): void {
    $redirects = [
        'custom-software' => 'custom-software-development',
        'erp-systems' => 'erp-business-systems',
    ];
    if (!is_singular('st_service')) {
        return;
    }
    $slug = get_post_field('post_name', get_the_ID());
    if (!isset($redirects[$slug])) {
        return;
    }
    $target = trailingslashit((string) get_post_type_archive_link('st_service')) . $redirects[$slug] . '/';
    wp_safe_redirect($target, 301);
    exit;
}, 1);
