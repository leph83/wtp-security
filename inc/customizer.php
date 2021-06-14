<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

if (!function_exists('wtp_security_plugin_increase_security')) {
    function wtp_security_plugin_increase_security($wp_customize)
    {
        // PANEL WTP Increase Security
        $wp_customize->add_panel(
            'wtp_security_plugin_panel',
            array(
                'title'      => __('WTP Increase Security', 'wtp-security'),
                'priority'   => 2000,
                'capability' => 'edit_theme_options',
            )
        );

        // SECTION - DISABLES
        $wp_customize->add_section('wtp_security_plugin_disable_section', array(
            'title'      => __('Disable', 'wtp-security'),
            'capability' => 'edit_theme_options',
            'panel'      => 'wtp_security_plugin_panel'
        ));

    }

    add_action('customize_register', 'wtp_security_plugin_increase_security');
}