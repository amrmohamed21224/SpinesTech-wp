<?php
declare(strict_types=1);

/**
 * SEO metadata for config-driven case study pages.
 */

if (!defined('ABSPATH')) {
    exit;
}

function st_case_study_seo_config(): array
{
    return [
        'backway' => [
            'meta_title' => [
                'ar' => 'منصة لوجستية متعددة الأطراف قائمة على الرحلات | دراسة حالة Backway',
                'en' => 'Trip-Based Multi-Party Logistics Platform | Backway Case Study',
            ],
            'meta_description' => [
                'ar' => 'دراسة حالة Backway: منصة شحن ولوجستيات تربط الشاحنين والسائقين والإدارة حول الرحلة كوحدة تشغيلية — تطبيقات جوال ولوحة تحكم متكاملة.',
                'en' => 'Backway case study: a trip-centric logistics platform connecting shippers, drivers, and operations through mobile apps and an integrated admin panel.',
            ],
        ],
        'merchant' => [
            'meta_title' => [
                'ar' => 'منصة تجارة إلكترونية متعددة البائعين | دراسة حالة Merchant',
                'en' => 'Multi-Vendor E-Commerce Platform | Merchant Case Study',
            ],
            'meta_description' => [
                'ar' => 'دراسة حالة Merchant: سوق أزياء إلكتروني متعدد البائعين يضم تطبيق عملاء، لوحة تجار، ولوحة إدارة مركزية جاهزة للتشغيل.',
                'en' => 'Merchant case study: a multi-vendor fashion marketplace with a customer app, vendor dashboard, and centralized admin panel ready to launch.',
            ],
        ],
        'propcare' => [
            'meta_title' => [
                'ar' => 'منصة إدارة أملاك وصيانة | دراسة حالة PropCare',
                'en' => 'Property Management Platform | PropCare Case Study',
            ],
            'meta_description' => [
                'ar' => 'دراسة حالة PropCare: منصة رقمية لإدارة خدمات الأملاك والصيانة — تطبيق عملاء، لوحة تحكم، وعقود سنوية.',
                'en' => 'PropCare case study: a digital property services platform with a customer app, admin dashboard, and annual contract management.',
            ],
        ],
        'lahza' => [
            'meta_title' => [
                'ar' => 'منصة حجز فعاليات في السعودية | دراسة حالة Lahza',
                'en' => 'Event Booking Platform Saudi Arabia | Lahza Case Study',
            ],
            'meta_description' => [
                'ar' => 'دراسة حالة Lahza: منصة حجز فعاليات وتذاكر في السعودية تربط المنظمين والحضور بتجربة حجز واضحة وقابلة للتوسع.',
                'en' => 'Lahza case study: a Saudi event booking and ticketing platform connecting organizers and attendees through a clear, scalable experience.',
            ],
        ],
        'supply-chain-erp' => [
            'meta_title' => [
                'ar' => 'نظام ERP وسلسلة إمداد تشغيلية | دراسة حالة',
                'en' => 'ERP & Supply Chain Operations System | Case Study',
            ],
            'meta_description' => [
                'ar' => 'دراسة حالة نظام ERP وسلسلة إمداد: منصة تشغيلية موحدة للمخزون والمشتريات والتوزيع والتقارير — مصممة لعمليات الأعمال في الخليج.',
                'en' => 'Supply chain ERP case study: a unified operations platform for inventory, procurement, distribution, and reporting — built for GCC business workflows.',
            ],
        ],
    ];
}

function st_case_study_apply_seo_hooks(string $slug): void
{
    $config = st_case_study_seo_config();
    if (!isset($config[$slug])) {
        return;
    }

    $seo = $config[$slug];

    add_filter('pre_get_document_title', static function () use ($seo): string {
        return (string) st_case_study_text($seo['meta_title']);
    }, 999);

    add_action('wp_head', static function () use ($seo): void {
        if (!function_exists('st_seo_set_description')) {
            return;
        }
        st_seo_set_description((string) st_case_study_text($seo['meta_description']));
    }, 3);
}
