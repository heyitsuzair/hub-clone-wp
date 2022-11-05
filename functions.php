<?php

/**
 * Theme Functions
 * @package HUB_WP
 */

if (!defined('HUB_WP_DIR_PATH')) {
    define('HUB_WP_DIR_PATH', untrailingslashit(get_template_directory()));
}
if (!defined('HUB_DIR_URI')) {
    define('HUB_WP_DIR_URI', untrailingslashit(get_template_directory_uri()));
}
require_once HUB_WP_DIR_PATH . './inc/helpers/autoloader.php';
require_once HUB_WP_DIR_PATH . './inc/helpers/template-tags.php';

function hub_get_theme_instance()
{
    \HUB_WP\Inc\HUB_WP::get_instance();
}

hub_get_theme_instance();