<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Repair text that was UTF-8 but got interpreted as Windows-1252/Latin-1.
 */
function st_repair_mojibake_text(string $text): string
{
    if ($text === '' || !preg_match('/[\x{00D8}\x{00D9}\x{00DB}\x{00C2}\x{00C3}\x{00E2}]/u', $text)) {
        return $text;
    }

    return preg_replace_callback(
        '/(?:[\x{0080}-\x{00FF}\x{0152}\x{0153}\x{0160}\x{0161}\x{0178}\x{017D}\x{017E}\x{0192}\x{02C6}\x{02DC}\x{2013}\x{2014}\x{2018}\x{2019}\x{201A}\x{201C}\x{201D}\x{201E}\x{2020}\x{2021}\x{2022}\x{2026}\x{2030}\x{2039}\x{203A}\x{20AC}\x{2122}]){2,}/u',
        static function (array $matches): string {
            $chunk = $matches[0];

            if (!preg_match('/[\x{00D8}\x{00D9}\x{00DB}\x{00C2}\x{00C3}\x{00E2}]/u', $chunk)) {
                return $chunk;
            }

            $bytes = st_windows1252_mojibake_to_bytes($chunk);
            if ($bytes === null || preg_match('//u', $bytes) !== 1) {
                return $chunk;
            }

            return preg_match('/\p{Arabic}|[\x{2013}\x{2014}\x{201C}\x{201D}\x{2019}\x{2022}\x{2026}]/u', $bytes) ? $bytes : $chunk;
        },
        $text
    ) ?? $text;
}

function st_windows1252_mojibake_to_bytes(string $text): ?string
{
    static $cp1252 = [
        0x20AC => 0x80, 0x201A => 0x82, 0x0192 => 0x83, 0x201E => 0x84,
        0x2026 => 0x85, 0x2020 => 0x86, 0x2021 => 0x87, 0x02C6 => 0x88,
        0x2030 => 0x89, 0x0160 => 0x8A, 0x2039 => 0x8B, 0x0152 => 0x8C,
        0x017D => 0x8E, 0x2018 => 0x91, 0x2019 => 0x92, 0x201C => 0x93,
        0x201D => 0x94, 0x2022 => 0x95, 0x2013 => 0x96, 0x2014 => 0x97,
        0x02DC => 0x98, 0x2122 => 0x99, 0x0161 => 0x9A, 0x203A => 0x9B,
        0x0153 => 0x9C, 0x017E => 0x9E, 0x0178 => 0x9F,
    ];

    $bytes = '';
    $chars = preg_split('//u', $text, -1, PREG_SPLIT_NO_EMPTY);

    if ($chars === false) {
        return null;
    }

    foreach ($chars as $char) {
        $code = st_utf8_codepoint($char);
        if ($code === null) {
            return null;
        }

        if ($code <= 0xFF) {
            $bytes .= chr($code);
            continue;
        }

        if (isset($cp1252[$code])) {
            $bytes .= chr($cp1252[$code]);
            continue;
        }

        return null;
    }

    return $bytes;
}

function st_utf8_codepoint(string $char): ?int
{
    $bytes = unpack('C*', $char);
    if ($bytes === false || $bytes === []) {
        return null;
    }

    $first = $bytes[1];
    $count = count($bytes);

    if ($count === 1) {
        return $first;
    }

    if ($count === 2) {
        return (($first & 0x1F) << 6) | ($bytes[2] & 0x3F);
    }

    if ($count === 3) {
        return (($first & 0x0F) << 12) | (($bytes[2] & 0x3F) << 6) | ($bytes[3] & 0x3F);
    }

    if ($count === 4) {
        return (($first & 0x07) << 18) | (($bytes[2] & 0x3F) << 12) | (($bytes[3] & 0x3F) << 6) | ($bytes[4] & 0x3F);
    }

    return null;
}

add_filter('option_blog_charset', static function (): string {
    return 'UTF-8';
});

add_action('template_redirect', static function (): void {
    if (is_admin() || wp_doing_ajax() || (defined('REST_REQUEST') && REST_REQUEST)) {
        return;
    }

    if (function_exists('st_locale') && st_locale() !== 'ar') {
        return;
    }

    ob_start(static function (string $html): string {
        $content_type = '';
        foreach (headers_list() as $header) {
            if (stripos($header, 'Content-Type:') === 0) {
                $content_type = $header;
                break;
            }
        }

        if ($content_type !== '' && stripos($content_type, 'text/html') === false) {
            return $html;
        }

        return st_repair_mojibake_text($html);
    });
}, 0);
