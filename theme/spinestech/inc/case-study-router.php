<?php
declare(strict_types=1);

/**
 * Virtual routing for theme-driven case studies (no WP post required).
 * URLs like /case-studies/backway/ render single-st_case_study.php directly.
 */
if (!defined('ABSPATH')) {
    exit;
}

/** @return array<string, list<string>> */
function st_case_study_virtual_slugs(): array
{
    return [
        'backway' => ['backway', 'backway-logistics', 'logistics'],
        'merchant' => ['merchant', 'merchant-ecommerce', 'fashion-marketplace'],
        'propcare' => ['propcare', 'propcare-360', 'property-management'],
        'lahza' => ['lahza', 'lahza-events', 'event-booking'],
        'supply-chain-erp' => ['supply-chain-erp'],
    ];
}

function st_case_study_canonical_slug(string $slug): ?string
{
    $slug = sanitize_title($slug);
    if ($slug === '') {
        return null;
    }

    foreach (st_case_study_virtual_slugs() as $canonical => $aliases) {
        if (in_array($slug, $aliases, true)) {
            return $canonical;
        }
    }

    return null;
}

function st_case_study_slug_from_request(): ?string
{
    $path = trim((string) parse_url((string) ($_SERVER['REQUEST_URI'] ?? ''), PHP_URL_PATH), '/');
    $parts = array_values(array_filter(explode('/', $path)));

    if (!empty($parts) && in_array($parts[0], ['ar', 'en'], true)) {
        array_shift($parts);
    }

    if (($parts[0] ?? '') !== 'case-studies' || empty($parts[1])) {
        return null;
    }

    $slug = sanitize_title((string) $parts[1]);

    return $slug !== '' ? $slug : null;
}

function st_case_study_virtual_title(string $canonical_slug): string
{
    if (function_exists('st_case_study_config') && function_exists('st_case_study_text')) {
        $cfg = st_case_study_config($canonical_slug);
        if ($cfg !== null && isset($cfg['title'])) {
            return (string) st_case_study_text($cfg['title']);
        }
    }

    return ucwords(str_replace('-', ' ', $canonical_slug));
}

function st_case_study_current_slug(): string
{
    $req_slug = st_case_study_slug_from_request();
    if ($req_slug !== null) {
        $canonical = st_case_study_canonical_slug($req_slug);
        return $canonical ?? $req_slug;
    }

    if (is_singular('st_case_study')) {
        global $post;
        if ($post instanceof WP_Post && $post->post_name !== '') {
            $canonical = st_case_study_canonical_slug($post->post_name);
            return $canonical ?? (string) $post->post_name;
        }

        $queried = get_queried_object();
        if ($queried instanceof WP_Post && $queried->post_name !== '') {
            $canonical = st_case_study_canonical_slug($queried->post_name);
            return $canonical ?? (string) $queried->post_name;
        }

        $id = get_the_ID();
        if ($id > 0) {
            $raw_slug = (string) get_post_field('post_name', $id);
            $canonical = st_case_study_canonical_slug($raw_slug);
            return $canonical ?? $raw_slug;
        }
    }

    return '';
}

function st_case_study_render_virtual(string $canonical_slug): void
{
    global $wp_query, $post;

    $virtual = new WP_Post((object) [
        'ID'             => 0,
        'post_author'    => 1,
        'post_date'      => current_time('mysql'),
        'post_date_gmt'  => current_time('mysql', 1),
        'post_content'   => '',
        'post_title'     => st_case_study_virtual_title($canonical_slug),
        'post_excerpt'   => '',
        'post_status'    => 'publish',
        'comment_status' => 'closed',
        'ping_status'    => 'closed',
        'post_name'      => $canonical_slug,
        'post_type'      => 'st_case_study',
        'filter'         => 'raw',
    ]);

    $post = $virtual;
    $wp_query->post = $virtual;
    $wp_query->posts = [$virtual];
    $wp_query->post_count = 1;
    $wp_query->found_posts = 1;
    $wp_query->max_num_pages = 1;
    $wp_query->is_404 = false;
    $wp_query->is_singular = true;
    $wp_query->is_single = true;
    $wp_query->is_archive = false;
    $wp_query->is_home = false;
    $wp_query->queried_object = $virtual;
    $wp_query->queried_object_id = 0;

    status_header(200);
    header('Content-Type: text/html; charset=UTF-8');

    include get_template_directory() . '/single-st_case_study.php';
    exit;
}

function st_case_study_is_archive_request(): bool
{
    $path = trim((string) parse_url((string) ($_SERVER['REQUEST_URI'] ?? ''), PHP_URL_PATH), '/');
    $parts = array_values(array_filter(explode('/', $path)));

    if (!empty($parts) && in_array($parts[0], ['ar', 'en'], true)) {
        array_shift($parts);
    }

    return count($parts) === 1 && $parts[0] === 'case-studies';
}

function st_case_study_render_virtual_archive(): void
{
    global $wp_query;

    $wp_query->is_404 = false;
    $wp_query->is_archive = true;
    $wp_query->is_post_type_archive = true;
    $wp_query->is_home = false;
    $wp_query->is_singular = false;
    $wp_query->is_page = false;

    status_header(200);
    header('Content-Type: text/html; charset=UTF-8');

    $tpl = get_template_directory() . '/archive-st_case_study.php';
    if (file_exists($tpl)) {
        include $tpl;
        exit;
    }
}

add_action('template_redirect', static function (): void {
    if (is_admin()) {
        return;
    }

    if (st_case_study_is_archive_request()) {
        st_case_study_render_virtual_archive();
        return;
    }

    if (is_singular('st_case_study')) {
        return;
    }

    $slug = st_case_study_slug_from_request();
    if ($slug === null) {
        return;
    }

    $canonical = st_case_study_canonical_slug($slug);
    if ($canonical === null) {
        return;
    }

    st_case_study_render_virtual($canonical);
}, 0);
