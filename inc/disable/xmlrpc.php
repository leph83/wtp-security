<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * DISABLE XMLRPC for enhanced security
 */
add_filter('xmlrpc_enabled', '__return_false');
