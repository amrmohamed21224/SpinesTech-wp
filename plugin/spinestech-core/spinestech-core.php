<?php
/**
 * Plugin Name: SpinesTech Core
 * Description: CPTs, ACF fields, forms, and Polylang for SpinesTech WordPress theme.
 * Version: 2.0.0
 * Author: SpinesTech
 * Text Domain: spinestech-core
 * Requires at least: 6.0
 * Requires PHP: 8.0
 */

if (!defined('ABSPATH')) {
    exit;
}

define('ST_HEADLESS_VERSION', '2.0.0');
define('ST_HEADLESS_PATH', plugin_dir_path(__FILE__));
define('ST_HEADLESS_URL', plugin_dir_url(__FILE__));

require_once ST_HEADLESS_PATH . 'includes/class-post-types.php';
require_once ST_HEADLESS_PATH . 'includes/class-plugin.php';

register_activation_hook(__FILE__, static function (): void {
    SpinesTech_Headless_Post_Types::register();
    flush_rewrite_rules();
});

SpinesTech_Headless_Plugin::instance();
