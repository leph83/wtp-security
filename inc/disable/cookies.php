<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (!function_exists('wtp_security_plugin_cookie_expire')) {
    function wtp_security_plugin_cookie_expire($time)
    {
        return 0;
    }
    add_filter('post_password_expires', 'wtp_security_plugin_cookie_expire');
}
