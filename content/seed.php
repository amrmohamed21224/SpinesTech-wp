<?php
/**
 * WP-CLI: wp eval-file content/seed.php
 * Seeds demo CPT content (Arabic). Run once after plugin activation.
 */
if (!defined('ABSPATH')) {
    exit("Run via WP-CLI inside WordPress.\n");
}

if (!class_exists('SpinesTech_Headless_Post_Types')) {
    exit("Activate spinestech-core first.\n");
}

$services = [
    ['slug' => 'custom-software', 'title' => 'تطوير برمجيات مخصصة', 'excerpt' => 'حلول برمجية مصممة لاحتياجات عملك.', 'icon' => 'code', 'features' => "تحليل متطلبات\nتصميم UX/UI\nتطوير agile"],
    ['slug' => 'erp-systems', 'title' => 'أنظمة ERP', 'excerpt' => 'ربط إداراتك في منصة واحدة.', 'icon' => 'account_tree', 'features' => "مالية\nمخازن\nموارد بشرية"],
    ['slug' => 'ai-automation', 'title' => 'أتمتة وذكاء اصطناعي', 'excerpt' => 'أتمتة العمليات واتخاذ القرار.', 'icon' => 'psychology', 'features' => "Chatbots\nOCR\nتحليلات"],
];

foreach ($services as $s) {
    if (get_page_by_path($s['slug'], OBJECT, 'st_service')) {
        continue;
    }
    $id = wp_insert_post([
        'post_type' => 'st_service',
        'post_status' => 'publish',
        'post_title' => $s['title'],
        'post_excerpt' => $s['excerpt'],
        'post_name' => $s['slug'],
    ]);
    if ($id && !is_wp_error($id)) {
        update_post_meta($id, 'st_icon', $s['icon']);
        update_post_meta($id, 'st_features', $s['features']);
    }
}

$plans = [
    ['slug' => 'starter', 'title' => 'باقة الانطلاق', 'tier' => 'Starter', 'recommended' => 0, 'features' => "استشارة\nMVP\nدعم 3 أشهر"],
    ['slug' => 'growth', 'title' => 'باقة النمو', 'tier' => 'Growth', 'recommended' => 1, 'features' => "فريق مخصص\nتكاملات\nSLA"],
    ['slug' => 'enterprise', 'title' => 'المؤسسات', 'tier' => 'Enterprise', 'recommended' => 0, 'features' => "On-prem\nأمان متقدم\nمدير حساب"],
];

foreach ($plans as $p) {
    if (get_page_by_path($p['slug'], OBJECT, 'st_pricing')) {
        continue;
    }
    $id = wp_insert_post([
        'post_type' => 'st_pricing',
        'post_status' => 'publish',
        'post_title' => $p['title'],
        'post_excerpt' => 'خطة ' . $p['tier'],
        'post_name' => $p['slug'],
    ]);
    if ($id && !is_wp_error($id)) {
        update_post_meta($id, 'st_tier', $p['tier']);
        update_post_meta($id, 'st_features', $p['features']);
        update_post_meta($id, 'st_recommended', $p['recommended']);
        update_post_meta($id, 'st_cta_text', 'اطلب عرض سعر');
    }
}

echo "Seed complete.\n";

$products = [
    [
        'slug' => 'erp-system',
        'title' => 'نظام ERP',
        'excerpt' => 'منصة متكاملة لإدارة الموارد.',
        'icon' => 'enterprise',
        'badge' => 'جاهز للتخصيص',
        'tagline' => 'كل إداراتك — منصة واحدة',
        'features' => "مالية\nمخازن\nمبيعات",
        'highlights' => "account_balance|المالية|IFRS وتقارير VAT\nlocal_shipping|الإمداد|تتبع مخزون لحظي\nanalytics|تحليلات|لوحات KPI\ncloud_sync|تكامل|API مفتوح",
        'modules' => "receipt_long|الحسابات|دفتر أستاذ وتقارير\nshopping_bag|المشتريات|أوامر وتقييم موردين\ninventory_2|المخازن|باركود وجرد\npoint_of_sale|المبيعات|فواتير ZATCA",
        'use_cases' => "التجزئة\nالتصنيع\nالإنشاء",
        'tech_specs' => "واجهة ويب + موبايل\nسحابي أو محلي\nZATCA",
    ],
];

foreach ($products as $p) {
    if (get_page_by_path($p['slug'], OBJECT, 'st_product')) {
        continue;
    }
    $id = wp_insert_post([
        'post_type' => 'st_product',
        'post_status' => 'publish',
        'post_title' => $p['title'],
        'post_excerpt' => $p['excerpt'],
        'post_name' => $p['slug'],
    ]);
    if ($id && !is_wp_error($id)) {
        update_post_meta($id, 'st_icon', $p['icon']);
        update_post_meta($id, 'st_badge', $p['badge']);
        update_post_meta($id, 'st_tagline', $p['tagline']);
        update_post_meta($id, 'st_features', $p['features']);
        update_post_meta($id, 'st_highlights', $p['highlights']);
        update_post_meta($id, 'st_modules', $p['modules']);
        update_post_meta($id, 'st_use_cases', $p['use_cases']);
        update_post_meta($id, 'st_tech_specs', $p['tech_specs']);
        update_post_meta($id, 'st_cta_primary', 'طلب عرض سعر');
    }
}
