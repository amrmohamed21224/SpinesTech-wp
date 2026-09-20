<?php
declare(strict_types=1);

/**
 * Virtual routing for web project cinematic pages.
 * URLs like /web-projects/lawyer/ render single-web-project.php directly.
 *
 * Follows the same pattern as case-study-router.php.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Extract the web project slug from the current request URI.
 * Supports language prefix: /ar/web-projects/lawyer/ or /web-projects/lawyer/
 *
 * @return string|null
 */
function st_web_project_slug_from_request(): ?string {
    $path  = trim( (string) parse_url( (string) ( $_SERVER['REQUEST_URI'] ?? '' ), PHP_URL_PATH ), '/' );
    $parts = array_values( array_filter( explode( '/', $path ) ) );

    // Strip optional lang prefix (ar / en)
    if ( ! empty( $parts ) && in_array( $parts[0], [ 'ar', 'en' ], true ) ) {
        array_shift( $parts );
    }

    // Expect: web-projects / {slug}
    if ( ( $parts[0] ?? '' ) !== 'web-projects' || empty( $parts[1] ) ) {
        return null;
    }

    $slug = sanitize_title( (string) $parts[1] );

    return $slug !== '' ? $slug : null;
}

/**
 * Check whether a slug is a known web project.
 *
 * @param  string $slug
 * @return bool
 */
function st_is_web_project_slug( string $slug ): bool {
    if ( ! function_exists( 'st_web_project_config' ) ) {
        return false;
    }
    return st_web_project_config( $slug ) !== null;
}

/**
 * Build and inject a virtual WP_Post, then render the web project template.
 * Mirrors st_case_study_render_virtual() in case-study-router.php.
 *
 * @param  string $slug
 * @return void
 */
function st_web_project_render_virtual( string $slug ): void {
    global $wp_query, $post;

    $cfg   = function_exists( 'st_web_project_config' ) ? st_web_project_config( $slug ) : null;
    $title = $cfg
        ? ( function_exists( 'st_wp_text' ) ? (string) st_wp_text( (array) ( $cfg['name'] ?? [] ) ) : $slug )
        : ucwords( str_replace( '-', ' ', $slug ) );

    $virtual = new WP_Post( (object) [
        'ID'             => 0,
        'post_author'    => 1,
        'post_date'      => current_time( 'mysql' ),
        'post_date_gmt'  => current_time( 'mysql', 1 ),
        'post_content'   => '',
        'post_title'     => $title,
        'post_excerpt'   => '',
        'post_status'    => 'publish',
        'comment_status' => 'closed',
        'ping_status'    => 'closed',
        'post_name'      => $slug,
        'post_type'      => 'page',
        'filter'         => 'raw',
    ] );

    $post                          = $virtual;
    $wp_query->post                = $virtual;
    $wp_query->posts               = [ $virtual ];
    $wp_query->post_count          = 1;
    $wp_query->found_posts         = 1;
    $wp_query->max_num_pages       = 1;
    $wp_query->is_404              = false;
    $wp_query->is_singular         = true;
    $wp_query->is_single           = false;
    $wp_query->is_page             = true;
    $wp_query->is_archive          = false;
    $wp_query->is_home             = false;
    $wp_query->queried_object      = $virtual;
    $wp_query->queried_object_id   = 0;

    // Pass the slug to the template via a global so it does not need to re-parse the URL.
    $GLOBALS['st_current_web_project_slug'] = $slug;

    status_header( 200 );
    header( 'Content-Type: text/html; charset=UTF-8' );

    include get_template_directory() . '/single-web-project.php';
    exit;
}

/**
 * Get current web project slug if viewing a web project page.
 *
 * @return string
 */
function st_web_project_current_slug(): string {
    if ( ! empty( $GLOBALS['st_current_web_project_slug'] ) ) {
        return (string) $GLOBALS['st_current_web_project_slug'];
    }

    $slug = st_web_project_slug_from_request();
    if ( $slug !== null && st_is_web_project_slug( $slug ) ) {
        return $slug;
    }

    return '';
}

/**
 * Hook into template_redirect to intercept /web-projects/{slug}/ URLs.
 */
add_action( 'template_redirect', static function (): void {
    if ( is_admin() ) {
        return;
    }

    $slug = st_web_project_slug_from_request();
    if ( $slug === null ) {
        return;
    }

    if ( ! st_is_web_project_slug( $slug ) ) {
        return;
    }

    st_web_project_render_virtual( $slug );
}, 0 );
