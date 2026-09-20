<?php
add_filter( 'pre_get_document_title', function () {
    $is_rtl = function_exists( 'st_locale' ) && st_locale() === 'ar';
    return $is_rtl
        ? 'باقات وخطط الأسعار لتطوير البرمجيات | SpinesTech'
        : 'Software Development Pricing Plans | SpinesTech';
}, 999 );

add_action( 'wp_head', function () {
    $is_rtl = function_exists( 'st_locale' ) && st_locale() === 'ar';
    if (function_exists('st_seo_set_description')) {
        st_seo_set_description($is_rtl
            ? 'استعرض نماذج تسعير تطوير البرمجيات وتطبيقات الجوال مع SpinesTech: نطاقات واضحة وتقديرات تكلفة شفافة لمشروعك.'
            : 'Explore transparent software and mobile app development pricing models with SpinesTech: clear scope estimates for your project.');
    }
}, 3 );

get_header(); ?>
<main class="pt-24 sm:pt-28 lg:pt-32 pb-24"><?php st_render_pricing_section(true); ?></main>
<?php get_footer(); ?>
