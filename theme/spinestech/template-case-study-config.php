<?php
/**
 * Template Name: Case Study — Config Driven
 * Template Post Type: st_case_study
 *
 * Minimal config-driven case study page (supply-chain-erp and future slugs).
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

$slug = (string) get_post_field('post_name', get_the_ID());
if ($slug === '') {
    $slug = 'supply-chain-erp';
}

if (function_exists('st_case_study_apply_seo_hooks')) {
    st_case_study_apply_seo_hooks($slug);
}

$config = function_exists('st_case_study_config') ? st_case_study_config($slug) : null;
$is_rtl = function_exists('st_locale') && st_locale() === 'ar';
$dir = $is_rtl ? 'rtl' : 'ltr';
$hero_title = $config && isset($config['title'])
    ? (string) st_case_study_text($config['title'])
    : get_the_title();

get_header();
?>

<main class="cs-config" dir="<?php echo esc_attr($dir); ?>" lang="<?php echo esc_attr($is_rtl ? 'ar' : 'en'); ?>">
    <header class="cs-config__hero">
        <div class="cs-config__hero-inner">
            <span class="cs-config__badge"><?php echo esc_html($is_rtl ? 'دراسة حالة من SpinesTech' : 'Case Study by SpinesTech'); ?></span>
            <h1 class="cs-config__title"><?php echo esc_html($hero_title); ?></h1>
        </div>
    </header>

    <div class="cs-config__content">
        <?php
        get_template_part('template-parts/case-study/sections', null, ['slug' => $slug]);
        get_template_part('template-parts/case-study/related-links', null, ['slug' => $slug]);
        ?>
    </div>
</main>

<?php
get_footer();
