<?php
/**
 * WP-CLI: wp eval-file content/create-pages.php
 * Creates the static pages required by the SpinesTech theme.
 */
if (!defined('ABSPATH')) {
    exit("Run via WP-CLI inside WordPress.\n");
}

$pages = [
    ['title' => 'من نحن', 'slug' => 'about', 'parent' => null],
    ['title' => 'تواصل معنا', 'slug' => 'contact', 'parent' => null],
    ['title' => 'الأسعار', 'slug' => 'pricing', 'parent' => null],
    ['title' => 'طلب عرض سعر', 'slug' => 'quote', 'parent' => null],
    ['title' => 'احجز استشارة', 'slug' => 'consultation', 'parent' => null],
    ['title' => 'الحلول', 'slug' => 'solutions', 'parent' => null],
    ['title' => 'الوظائف', 'slug' => 'careers', 'parent' => null],
    ['title' => 'الوظائف المتاحة', 'slug' => 'jobs', 'parent' => 'careers'],
    ['title' => 'بيئة العمل', 'slug' => 'work-environment', 'parent' => 'careers'],
];

$created = 0;
$skipped = 0;

foreach ($pages as $page) {
    $parent_id = 0;
    if ($page['parent']) {
        $parent = get_page_by_path($page['parent']);
        if ($parent instanceof WP_Post) {
            $parent_id = (int) $parent->ID;
        }
    }

    $path = $page['parent'] ? $page['parent'] . '/' . $page['slug'] : $page['slug'];
    if (get_page_by_path($path) instanceof WP_Post) {
        $skipped++;
        continue;
    }

    $id = wp_insert_post([
        'post_type' => 'page',
        'post_status' => 'publish',
        'post_title' => $page['title'],
        'post_name' => $page['slug'],
        'post_parent' => $parent_id,
        'post_content' => '',
    ]);

    if ($id && !is_wp_error($id)) {
        $created++;
    }
}

flush_rewrite_rules();

echo sprintf(
    "Pages ready. Created: %d. Existing: %d. Permalinks flushed.\n",
    $created,
    $skipped
);
