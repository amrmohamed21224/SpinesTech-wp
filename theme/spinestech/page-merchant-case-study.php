<?php
/**
 * Template Name: Merchant Case Study Page
 *
 * theme/spinestech/page-merchant-case-study.php
 *
 * A standalone WordPress Page template that renders the Merchant
 * case study. Assign this template to any regular Page post in WP Admin.
 * This bypasses st_case_study routing entirely.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// Enqueue Merchant-specific assets
add_action( 'wp_enqueue_scripts', function () {
    $ver = wp_get_theme()->get( 'Version' );
    wp_enqueue_style(
        'st-merchant-case-study',
        st_asset( 'css/pages/single-case-study-merchant.css' ),
        [ 'st-main' ],
        $ver
    );
    wp_enqueue_script(
        'st-case-study-merchant',
        st_asset( 'js/case-study-merchant.js' ),
        [],
        $ver,
        true
    );
}, 20 );

// Render the Merchant template
include get_template_directory() . '/template-case-study-merchant.php';
