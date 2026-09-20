<?php
declare(strict_types=1);

/**
 * Web Projects config — canonical data for all client website projects.
 * Follows the same pattern as service-landings.php and case-study-config.php.
 *
 * To add a new project:
 *  1. Add a new entry to st_web_projects_config() keyed by its slug.
 *  2. Create assets/images/web-projects/{slug}/ with:
 *       preview.webp  — card thumbnail (800 × 450 px)
 *       hero.webp     — full-width hero (1920 × 1080 px)
 *       screen-1.webp — extra screenshot
 *       screen-2.webp — extra screenshot
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Returns all registered web project slugs (in display order).
 *
 * @return list<string>
 */
function st_web_project_slugs(): array {
    return [
        'lawyer',
        'awan-digital',
    ];
}

/**
 * Full config for every web project.
 *
 * @return array<string, array<string, mixed>>
 */
function st_web_projects_config(): array {
    return [

        /* ── 01 · محمد محسن للمحاماة ─────────────────────────── */
        'lawyer' => [
            'slug'    => 'lawyer',
            'name'    => [
                'ar' => 'محمد محسن للمحاماة',
                'en' => 'Mohamed Mohsen Law Office',
            ],
            'tagline' => [
                'ar' => 'محامٍ جنائي — مساندة قانونية احترافية ووضوح في التواصل',
                'en' => 'Criminal Lawyer — Professional Legal Support & Clear Communication',
            ],
            'description' => [
                'ar' => 'موقع احترافي لمكتب محمد محسن للمحاماة الجنائية في الدقهلية، مصمم ليعكس ثقة العميل ووضوح الخدمة القانونية. يتضمن عرضاً لأبرز القضايا، الخدمات القانونية، والتواصل المباشر.',
                'en' => 'A professional website for Mohamed Mohsen Criminal Law Office in Dakahlia, designed to reflect client trust and clarity of legal service. Features key case highlights, legal services showcase, and direct contact options.',
            ],
            'type' => [
                'ar' => 'موقع خدمات قانونية',
                'en' => 'Legal Services Website',
            ],
            'sector' => [
                'ar' => 'قانوني',
                'en' => 'Legal',
            ],
            'tech'    => [ 'WordPress', 'Custom Theme', 'PHP', 'Vanilla CSS', 'JavaScript' ],
            'color'   => '#b8963e',   // gold accent — matches the site palette
            'color_soft' => 'rgba(184, 150, 62, 0.12)',
            'color_glow' => 'rgba(184, 150, 62, 0.25)',
            'live_url'   => 'https://mohamed-mohsen-lawyer.great-site.net/?i=1',
            'year'       => '2025',
            'highlights' => [
                'ar' => [
                    'تصميم داكن راقٍ بلهجة ذهبية تعكس المصداقية القانونية',
                    'عرض واضح للخدمات والقضايا والتخصصات',
                    'تجربة تواصل سهلة عبر واتساب وأرقام مباشرة',
                    'متوافق مع الجوال بالكامل وسريع التحميل',
                ],
                'en' => [
                    'Premium dark design with gold accents reflecting legal credibility',
                    'Clear showcase of services, cases, and specializations',
                    'Easy contact experience via WhatsApp and direct numbers',
                    'Fully mobile-responsive and fast loading',
                ],
            ],
            'images' => [
                'preview'  => 'web-projects/lawyer/preview.webp',
                'hero'     => 'web-projects/lawyer/hero.webp',
                'screens'  => [
                    'web-projects/lawyer/screen-1.webp',
                    'web-projects/lawyer/screen-2.webp',
                ],
            ],
        ],

        /* ── 02 · أوان ديجيتال ───────────────────────────────── */
        'awan-digital' => [
            'slug'    => 'awan-digital',
            'name'    => [
                'ar' => 'أوان ديجيتال',
                'en' => 'Awan Digital',
            ],
            'tagline' => [
                'ar' => 'وكالة SEO وتسويق رقمي — نحوّل ظهورك في جوجل إلى عملاء حقيقيين',
                'en' => 'SEO & Digital Marketing Agency — Turning Your Google Presence into Real Clients',
            ],
            'description' => [
                'ar' => 'موقع متكامل لوكالة أوان ديجيتال للـ SEO والتسويق الرقمي، يعرض خدمات النمو، دراسات الحالة، ومحتوى تسويقياً استراتيجياً. مبني على WordPress بثيم مخصص بالكامل يعكس احترافية الوكالة وهوية العلامة التجارية.',
                'en' => 'A full-featured website for Awan Digital SEO & Digital Marketing Agency, showcasing growth services, case studies, and strategic marketing content. Built on WordPress with a fully custom theme reflecting the agency\'s professionalism and brand identity.',
            ],
            'type' => [
                'ar' => 'موقع وكالة تسويق رقمي',
                'en' => 'Digital Marketing Agency Website',
            ],
            'sector' => [
                'ar' => 'تسويق رقمي',
                'en' => 'Digital Marketing',
            ],
            'tech'    => [ 'WordPress', 'Custom Theme', 'PHP', 'Vanilla CSS', 'JavaScript', 'SEO' ],
            'color'   => '#7c3aed',   // purple accent — matches the site palette
            'color_soft' => 'rgba(124, 58, 237, 0.12)',
            'color_glow' => 'rgba(124, 58, 237, 0.25)',
            'live_url'   => 'https://awan-digital.great-site.net/',
            'year'       => '2026',
            'highlights' => [
                'ar' => [
                    'هوية بصرية قوية بألوان بنفسجية وخطوط عصرية',
                    'صفحات خدمات مبنية على نية البحث والـ SEO',
                    'نظام دراسات حالة متكامل لعرض نتائج العملاء',
                    'تجربة مستخدم سلسة بتصميم responsive بالكامل',
                ],
                'en' => [
                    'Strong visual identity with purple tones and modern typography',
                    'Service pages built around search intent and SEO best practices',
                    'Integrated case study system for showcasing client results',
                    'Smooth user experience with fully responsive design',
                ],
            ],
            'images' => [
                'preview'  => 'web-projects/awan-digital/preview.webp',
                'hero'     => 'web-projects/awan-digital/hero.webp',
                'screens'  => [
                    'web-projects/awan-digital/screen-1.webp',
                    'web-projects/awan-digital/screen-2.webp',
                ],
            ],
        ],

    ];
}

/**
 * Get config for a single project by slug.
 *
 * @param  string $slug
 * @return array<string, mixed>|null
 */
function st_web_project_config( string $slug ): ?array {
    $all = st_web_projects_config();
    return $all[ $slug ] ?? null;
}

/**
 * Translate a field value using the current locale.
 *
 * @param  array<string, string|list<string>> $field
 * @return string|array
 */
function st_wp_text( array $field ) {
    $locale = function_exists( 'st_locale' ) ? st_locale() : 'ar';
    return $field[ $locale ] ?? $field['ar'] ?? ( is_array( reset( $field ) ) ? [] : '' );
}

/**
 * Build the URL for a web project's cinematic page.
 *
 * @param  string $slug
 * @return string
 */
function st_web_project_url( string $slug ): string {
    return function_exists( 'st_url' )
        ? st_url( '/web-projects/' . $slug . '/' )
        : home_url( '/web-projects/' . $slug . '/' );
}

/**
 * Resolve an image asset URL for a web project image path.
 *
 * @param  string $rel  e.g. 'web-projects/lawyer/preview.webp'
 * @return string
 */
function st_wp_img( string $rel ): string {
    $clean_rel = ltrim( $rel, '/' );
    $file_path = get_template_directory() . '/assets/images/' . $clean_rel;

    if ( ! file_exists( $file_path ) ) {
        // Fallback to placeholder/icon if the specific web-project screen asset is missing
        $fallback = get_template_directory() . '/assets/images/brand/icon.png';
        if ( file_exists( $fallback ) ) {
            return function_exists( 'st_asset' )
                ? st_asset( 'images/brand/icon.png' )
                : get_template_directory_uri() . '/assets/images/brand/icon.png';
        }
    }

    return function_exists( 'st_asset' )
        ? st_asset( 'images/' . $clean_rel )
        : get_template_directory_uri() . '/assets/images/' . $clean_rel;
}
