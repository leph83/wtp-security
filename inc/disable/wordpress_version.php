<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Don't Show Version of Wordpress
 */
if (!function_exists('wtp_security_plugin_remove_version')) {
    function wtp_security_plugin_remove_version()
    {
        return '';
    }
    add_filter('the_generator', 'wtp_security_plugin_remove_version');
}
