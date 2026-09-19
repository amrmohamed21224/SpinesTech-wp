<?php
declare(strict_types=1);

/**
 * Ensures st_service CPT posts exist for every landing slug in service-landings config.
 */
if (!defined('ABSPATH')) {
    exit;
}

function st_bootstrap_service_posts(): void
{
    if (!function_exists('st_service_landing_config') || !post_type_exists('st_service')) {
        return;
    }

    $config = st_service_landing_config();
    foreach ($config as $slug => $data) {
        $existing = get_page_by_path($slug, OBJECT, 'st_service');
        if ($existing instanceof WP_Post) {
            continue;
        }

        $title = is_array($data['title'] ?? null) ? ($data['title']['ar'] ?? $slug) : $slug;
        $excerpt = is_array($data['intro'] ?? null) ? ($data['intro']['ar'] ?? '') : '';

        $id = wp_insert_post([
            'post_type'   => 'st_service',
            'post_status' => 'publish',
            'post_title'  => $title,
            'post_excerpt'=> wp_strip_all_tags($excerpt),
            'post_name'   => $slug,
            'post_content'=> '',
        ], true);

        if (!is_wp_error($id) && $id) {
            $icon = $data['icon'] ?? 'code';
            update_post_meta((int) $id, 'st_icon', $icon);
        }
    }
}

add_action('after_switch_theme', 'st_bootstrap_service_posts');
add_action('init', function (): void {
    if (!is_admin() || !current_user_can('manage_options')) {
        return;
    }
    if (empty($_GET['st_bootstrap_services'])) {
        return;
    }
    st_bootstrap_service_posts();
}, 99);
