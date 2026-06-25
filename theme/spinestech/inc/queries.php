<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

function st_query_cpt(string $post_type, int $limit = -1): array
{
    $posts = get_posts([
        'post_type' => $post_type,
        'posts_per_page' => $limit,
        'orderby' => ['menu_order' => 'ASC', 'title' => 'ASC'],
        'order' => 'ASC',
        'post_status' => 'publish',
        'suppress_filters' => false,
    ]);

    return array_map(static fn ($post) => st_map_cpt($post_type, $post), $posts);
}

function st_map_cpt(string $post_type, WP_Post $post): array
{
    if (class_exists('SpinesTech_Headless_Mappers')) {
        return match ($post_type) {
            'st_service' => SpinesTech_Headless_Mappers::service($post),
            'st_product' => SpinesTech_Headless_Mappers::product($post),
            'st_sector' => SpinesTech_Headless_Mappers::sector($post),
            'st_case_study' => SpinesTech_Headless_Mappers::case_study($post),
            'st_pricing' => SpinesTech_Headless_Mappers::pricing($post),
            'st_faq' => SpinesTech_Headless_Mappers::faq($post),
            'st_job' => SpinesTech_Headless_Mappers::job($post),
            default => ['id' => (string) $post->ID, 'title' => get_the_title($post), 'slug' => $post->post_name],
        };
    }

    return [
        'id' => $post->post_name ?: (string) $post->ID,
        'title' => get_the_title($post),
        'description' => get_the_excerpt($post),
        'slug' => $post->post_name,
    ];
}

function st_cpt_link(string $base, string $slug): string
{
    return st_url('/' . trim($base, '/') . '/' . $slug . '/');
}

/** @return list<array{icon:string,title:string,body:string}> */
function st_parse_pipe_meta(int $post_id, string $key): array
{
    if (!class_exists('SpinesTech_Headless_Meta')) {
        return [];
    }
    $out = [];
    foreach (SpinesTech_Headless_Meta::get_string_list($post_id, $key) as $line) {
        $p = array_map('trim', explode('|', $line));
        if (count($p) < 2) {
            continue;
        }
        $out[] = [
            'icon' => $p[0],
            'title' => $p[1],
            'body' => $p[2] ?? '',
        ];
    }
    return $out;
}
