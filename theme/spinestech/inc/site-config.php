<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

/** WhatsApp business number (digits only, no +). Egypt: 01099293903 → 201099293903 */
if (!defined('ST_WHATSAPP_NUMBER')) {
    define('ST_WHATSAPP_NUMBER', '201099293903');
}

/** Entity positioning — consistent across site, schema, and AI visibility. */
function st_entity_description(string $locale = ''): string
{
    $locale = $locale !== '' ? $locale : (function_exists('st_locale') ? st_locale() : 'ar');

    $descriptions = [
        'ar' => 'SpinesTech شركة تطوير برمجيات تبني تطبيقات جوال ومنصات ويب ولوحات تحكم وأنظمة أعمال مخصصة للشركات في الخليج.',
        'en' => 'SpinesTech is a software development company that builds custom mobile apps, web platforms, dashboards, and business systems for companies in the GCC.',
    ];

    return $descriptions[$locale] ?? $descriptions['ar'];
}

/** Official profile URLs for Organization sameAs (update when available). */
function st_organization_same_as(): array
{
    $urls = array_filter([
        'https://www.linkedin.com/company/spinestech',
        'https://github.com/spinestech',
        'https://clutch.co/profile/spinestech',
    ]);

    return apply_filters('st_organization_same_as', $urls);
}

function st_whatsapp_url(string $message = ''): string
{
    $number = preg_replace('/\D+/', '', (string) ST_WHATSAPP_NUMBER);
    $url = 'https://wa.me/' . $number;
    if ($message !== '') {
        $url .= '?text=' . rawurlencode($message);
    }
    return $url;
}
