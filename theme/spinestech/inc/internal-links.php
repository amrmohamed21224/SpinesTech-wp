<?php
declare(strict_types=1);

/**
 * Internal linking helpers for service landings.
 */

if (!defined('ABSPATH')) {
    exit;
}

function st_normalize_service_slug(string $service_slug): string
{
    static $aliases = [
        'custom-software' => 'custom-software-development',
        'erp-systems' => 'erp-business-systems',
    ];

    return $aliases[$service_slug] ?? $service_slug;
}

/** @return list<string> */
function st_internal_service_case_studies(string $service_slug): array
{
    static $map = [
        'mobile-app-development' => ['backway', 'merchant', 'lahza'],
        'marketplace-development' => ['merchant'],
        'booking-platform-development' => ['lahza'],
        'erp-business-systems' => ['supply-chain-erp', 'backway'],
        'custom-software-development' => ['supply-chain-erp', 'backway'],
        'admin-dashboard-development' => ['propcare', 'merchant'],
        'web-platform-development' => ['propcare', 'merchant'],
        'grc-compliance-systems' => [],
        'white-label-software-development' => ['merchant'],
    ];

    $slug = st_normalize_service_slug($service_slug);

    return $map[$slug] ?? [];
}

/** @return list<string> */
function st_internal_service_articles(string $service_slug): array
{
    static $map = [
        'mobile-app-development' => [
            'mobile-app-development-cost-saudi-arabia',
            'flutter-vs-native',
            'mobile-app-development-timeline',
            'how-to-choose-software-company',
            'saudi-app-launch-requirements',
        ],
        'web-platform-development' => [
            'manual-process-to-digital-system',
            'how-to-choose-software-company',
        ],
        'custom-software-development' => [
            'erp-vs-custom-software',
            'manual-process-to-digital-system',
            'how-to-choose-software-company',
        ],
        'admin-dashboard-development' => [
            'when-you-need-admin-dashboard',
            'manual-process-to-digital-system',
        ],
        'marketplace-development' => [
            'how-to-choose-software-company',
            'mobile-app-development-cost-saudi-arabia',
        ],
        'booking-platform-development' => [
            'mobile-app-development-timeline',
            'saudi-app-launch-requirements',
        ],
        'erp-business-systems' => [
            'erp-vs-custom-software',
            'manual-process-to-digital-system',
            'when-you-need-admin-dashboard',
        ],
        'grc-compliance-systems' => [
            'what-is-grc',
        ],
        'white-label-software-development' => [
            'how-to-choose-software-company',
        ],
    ];

    $slug = st_normalize_service_slug($service_slug);

    return $map[$slug] ?? [];
}

/** @return WP_Post[] */
function st_get_linked_case_studies(string $service_slug, int $limit = 3): array
{
    if ($limit < 1) {
        return [];
    }

    $slugs = array_slice(st_internal_service_case_studies($service_slug), 0, $limit);
    if ($slugs === []) {
        return [];
    }

    $posts = get_posts([
        'post_type' => 'st_case_study',
        'post_name__in' => $slugs,
        'posts_per_page' => count($slugs),
        'post_status' => 'publish',
        'orderby' => 'post_name__in',
        'order' => 'ASC',
        'suppress_filters' => false,
    ]);

    if ($posts === []) {
        return [];
    }

    /** @var array<string, WP_Post> $by_slug */
    $by_slug = [];
    foreach ($posts as $post) {
        if ($post instanceof WP_Post) {
            $by_slug[$post->post_name] = $post;
        }
    }

    $ordered = [];
    foreach ($slugs as $slug) {
        if (isset($by_slug[$slug])) {
            $ordered[] = $by_slug[$slug];
        }
        if (count($ordered) >= $limit) {
            break;
        }
    }

    return $ordered;
}

/** @return WP_Post[] */
function st_get_linked_articles(string $service_slug, int $limit = 4): array
{
    if ($limit < 1) {
        return [];
    }

    $hints = array_slice(st_internal_service_articles($service_slug), 0, $limit);
    $found = [];
    $exclude_ids = [];

    foreach ($hints as $slug) {
        $post = get_page_by_path($slug, OBJECT, 'post');
        if ($post instanceof WP_Post && $post->post_status === 'publish') {
            $found[] = $post;
            $exclude_ids[] = (int) $post->ID;
        }
        if (count($found) >= $limit) {
            return $found;
        }
    }

    $remaining = $limit - count($found);
    if ($remaining < 1) {
        return $found;
    }

    $recent = get_posts([
        'post_type' => 'post',
        'posts_per_page' => $remaining,
        'post_status' => 'publish',
        'post__not_in' => $exclude_ids,
        'orderby' => 'date',
        'order' => 'DESC',
        'suppress_filters' => false,
    ]);

    foreach ($recent as $post) {
        if ($post instanceof WP_Post) {
            $found[] = $post;
        }
    }

    return $found;
}

function st_case_study_url_by_slug(string $slug): string
{
    $canonical = function_exists('st_case_study_canonical_slug')
        ? st_case_study_canonical_slug($slug)
        : sanitize_title($slug);

    if ($canonical === null || $canonical === '') {
        $canonical = sanitize_title($slug);
    }

    if (function_exists('st_url')) {
        return st_url('/case-studies/' . $canonical . '/');
    }

    return home_url('/case-studies/' . $canonical . '/');
}

/** @return list<string> */
function st_get_services_for_article(string $article_slug): array
{
    static $reverse = null;
    if ($reverse === null) {
        $reverse = [];
        if (function_exists('st_service_slugs')) {
            foreach (st_service_slugs() as $service_slug) {
                foreach (st_internal_service_articles($service_slug) as $art_slug) {
                    $reverse[$art_slug][] = $service_slug;
                }
            }
        }
    }

    return array_values(array_unique($reverse[$article_slug] ?? []));
}

/** @return list<string> */
function st_get_cases_for_article(string $article_slug): array
{
    if (!function_exists('st_get_article_related')) {
        return [];
    }

    return st_get_article_related($article_slug)['related_cases'] ?? [];
}
