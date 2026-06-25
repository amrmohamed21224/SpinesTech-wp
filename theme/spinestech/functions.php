<?php
/**
 * Theme Name: SpinesTech
 * Theme URI: https://spinestech.com
 * Author: SpinesTech
 * Description: Custom WordPress theme for SpinesTech — matches the React design 1:1.
 * Version: 1.0.0
 * Requires at least: 6.0
 * Requires PHP: 8.0
 * Text Domain: spinestech
 */

if (!defined('ABSPATH')) {
    exit;
}

define('ST_THEME_VERSION', '1.0.0');

require_once get_template_directory() . '/inc/i18n.php';
require_once get_template_directory() . '/inc/queries.php';
require_once get_template_directory() . '/inc/template-tags.php';
require_once get_template_directory() . '/inc/enqueue.php';
