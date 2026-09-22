<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

function st_locale(): string
{
    $path = parse_url((string) ($_SERVER['REQUEST_URI'] ?? '/'), PHP_URL_PATH) ?: '/';
    $segments = array_values(array_filter(explode('/', trim($path, '/'))));
    if (isset($segments[0]) && in_array($segments[0], ['ar', 'en'], true)) {
        return $segments[0];
    }

    if (isset($_GET['lang']) && in_array($_GET['lang'], ['ar', 'en'], true)) {
        return $_GET['lang'];
    }

    if (isset($_COOKIE['st_lang']) && in_array($_COOKIE['st_lang'], ['ar', 'en'], true)) {
        return $_COOKIE['st_lang'];
    }

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
    return st_localized_url($path, st_locale());
}

function st_asset(string $rel): string
{
    return get_template_directory_uri() . '/assets/' . ltrim($rel, '/');
}

function st_is_current(string $path): bool
{
    $path = untrailingslashit($path);
    $current = untrailingslashit(st_strip_lang_prefix(parse_url((string) ($_SERVER['REQUEST_URI'] ?? ''), PHP_URL_PATH) ?: ''));
    if ($path === '' || $path === '/') {
        return $current === '' || $current === '/' || is_front_page();
    }
    return str_ends_with($current, $path);
}

function st_lang_url(string $lang): string
{
    $lang = in_array($lang, ['ar', 'en'], true) ? $lang : 'ar';
    return st_localized_url(st_current_canonical_path(), $lang);
}

function st_lang_switch_url(): string
{
    $target = st_locale() === 'ar' ? 'en' : 'ar';
    $current = parse_url((string) ($_SERVER['REQUEST_URI'] ?? '/'), PHP_URL_PATH) ?: '/';
    
    // Strip pagination to prevent 404s when target language lacks those pages
    $current = preg_replace('#/page/\d+/?$#', '/', $current);
    
    $query = parse_url((string) ($_SERVER['REQUEST_URI'] ?? ''), PHP_URL_QUERY);
    $clean_path = st_strip_lang_prefix($current);
    $url = st_localized_url($clean_path, $target);
    
    $params = [];
    if ($query) {
        parse_str($query, $params);
    }
    
    // ALWAYS append the lang parameter so that functions.php can catch it, update the cookie, and redirect.
    // This prevents the user from being trapped in English due to the st_lang cookie.
    $params['lang'] = $target;
    
    return $url . '?' . http_build_query($params);
}

function st_strip_lang_prefix(string $path): string
{
    $path = '/' . ltrim($path, '/');
    if (preg_match('#^/(ar|en)(/.*)?$#', $path, $matches)) {
        return $matches[2] ?? '/';
    }
    return $path;
}

function st_localized_url(string $path = '/', ?string $locale = null): string
{
    $locale = in_array($locale, ['ar', 'en'], true) ? $locale : st_locale();
    $path = st_strip_lang_prefix($path);
    $parts = parse_url($path);
    $clean_path = '/' . ltrim((string) ($parts['path'] ?? '/'), '/');
    $clean_path = $clean_path === '//' ? '/' : $clean_path;

    if ($clean_path === '/') {
        $url = home_url('/');
    } else {
        if (function_exists('pll_home_url')) {
            $url = trailingslashit((string) pll_home_url($locale)) . ltrim($clean_path, '/');
        } else {
            // For the default Arabic language, do not inject the prefix to match native WP permalinks
            if ($locale === 'ar') {
                $url = home_url(trailingslashit($clean_path));
            } else {
                $url = home_url('/' . $locale . trailingslashit($clean_path));
            }
        }
    }

    if (!empty($parts['query'])) {
        $url .= '?' . $parts['query'];
    }
    return $url;
}

function st_current_canonical_path(): string
{
    $current = parse_url((string) ($_SERVER['REQUEST_URI'] ?? '/'), PHP_URL_PATH) ?: '/';
    
    // Strip pagination to prevent 404s when target language lacks those pages
    $current = preg_replace('#/page/\d+/?$#', '/', $current);
    
    return st_strip_lang_prefix($current);
}

function st_localize_internal_url(string $url, ?string $locale = null): string
{
    if ($url === '' || is_admin()) {
        return $url;
    }

    $home_host = parse_url(home_url('/'), PHP_URL_HOST);
    $url_host = parse_url($url, PHP_URL_HOST);
    if ($url_host && $home_host && strtolower((string) $url_host) !== strtolower((string) $home_host)) {
        return $url;
    }

    $path = parse_url($url, PHP_URL_PATH) ?: '/';
    if (preg_match('#^/(wp-admin|wp-login\.php|wp-json|wp-content|wp-includes)(/|$)#', $path)) {
        return $url;
    }

    if (preg_match('#\.[a-z0-9]{2,5}$#i', $path)) {
        return $url;
    }

    $clean_path = st_strip_lang_prefix($path);
    $query = parse_url($url, PHP_URL_QUERY);
    $fragment = parse_url($url, PHP_URL_FRAGMENT);
    $localized = st_localized_url($clean_path, $locale ?: st_locale());
    if ($query) {
        $localized .= '?' . $query;
    }
    if ($fragment) {
        $localized .= '#' . $fragment;
    }
    return $localized;
}
