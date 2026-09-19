<?php
declare(strict_types=1);

/**
 * Seeds buyer-intent articles when missing (admin: ?st_bootstrap_articles=1).
 * Force refresh existing shells: ?st_bootstrap_articles=1&st_force=1
 * Post body is rendered from inc/article-landings.php — WP posts are slug shells.
 */
if (!defined('ABSPATH')) {
    exit;
}

function st_bootstrap_mvp_articles(bool $force = false): void
{
    if (!function_exists('st_article_slugs') || !function_exists('st_article_config')) {
        return;
    }

    $locale = function_exists('st_locale') ? st_locale() : 'ar';

    foreach (st_article_slugs() as $slug) {
        $existing = get_page_by_path($slug, OBJECT, 'post');
        $cfg = st_article_config($slug);
        if ($cfg === null) {
            continue;
        }

        $title = (string) st_article_text($cfg['title'], $locale);
        $excerpt = wp_strip_all_tags((string) st_article_text($cfg['excerpt'], $locale));
        $shell = '<!-- Content rendered from article-landings.php -->';

        if ($existing instanceof WP_Post) {
            if (!$force) {
                continue;
            }
            wp_update_post([
                'ID'           => (int) $existing->ID,
                'post_title'   => $title,
                'post_excerpt' => $excerpt,
                'post_content' => $shell,
                'post_status'  => 'publish',
            ]);
            continue;
        }

        wp_insert_post([
            'post_type'    => 'post',
            'post_status'  => 'publish',
            'post_name'    => $slug,
            'post_title'   => $title,
            'post_excerpt' => $excerpt,
            'post_content' => $shell,
        ]);
    }
}

add_action('after_switch_theme', static function (): void {
    st_bootstrap_mvp_articles(false);
});

add_action('init', static function (): void {
    if (!is_admin() || !current_user_can('manage_options') || empty($_GET['st_bootstrap_articles'])) {
        return;
    }
    $force = !empty($_GET['st_force']);
    st_bootstrap_mvp_articles($force);
}, 99);
