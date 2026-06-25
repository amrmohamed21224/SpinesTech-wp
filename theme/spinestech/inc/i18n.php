<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

function st_locale(): string
{
    if (function_exists('pll_current_language')) {
        $lang = pll_current_language('slug');
        if (in_array($lang, ['ar', 'en'], true)) {
            return $lang;
        }
    }
    return 'ar';
}

function st_dir(): string
{
    return st_locale() === 'ar' ? 'rtl' : 'ltr';
}

function st_t(string $key): string
{
    static $cache = [];
    $locale = st_locale();
    if (!isset($cache[$locale])) {
        $file = get_template_directory() . '/inc/i18n/' . $locale . '.php';
        $cache[$locale] = is_readable($file) ? require $file : [];
    }
    return $cache[$locale][$key] ?? $key;
}

function st_url(string $path = '/'): string
{
    $path = '/' . ltrim($path, '/');
    if (function_exists('pll_home_url')) {
        return trailingslashit(pll_home_url(st_locale())) . ltrim($path, '/');
    }
    return home_url($path);
}

function st_asset(string $rel): string
{
    return get_template_directory_uri() . '/assets/' . ltrim($rel, '/');
}

function st_is_current(string $path): bool
{
    $path = untrailingslashit($path);
    $current = untrailingslashit(parse_url((string) ($_SERVER['REQUEST_URI'] ?? ''), PHP_URL_PATH) ?: '');
    if ($path === '' || $path === '/') {
        return $current === '' || $current === '/' || is_front_page();
    }
    return str_ends_with($current, $path);
}

function st_lang_switch_url(): string
{
    $target = st_locale() === 'ar' ? 'en' : 'ar';
    if (function_exists('pll_the_languages')) {
        $langs = pll_the_languages(['raw' => 1]);
        if (is_array($langs)) {
            foreach ($langs as $lang) {
                if (($lang['slug'] ?? '') === $target && !empty($lang['url'])) {
                    return $lang['url'];
                }
            }
        }
    }
    return home_url('/?lang=' . $target);
}
