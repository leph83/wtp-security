<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// ADD Disables - check filename
$wtp_security_plugin_disables = array(
    'edit_css' => 'disable theme editor',
    'restapi' => 'disable rest API',
    'emoji' => 'disable emojis',
    'embed' => 'disable embeds',
    'xmlrpc' => 'disable xmlrpc',
    'cookies' => 'Remove Cookie after closing Browser',
    'wordpress_version' => 'hide Wordpress version',
);

// ADD SETTING TO CUSTOMIZER
if (!function_exists('wtp_security_plugin_customizer_disables') ) {
    function wtp_security_plugin_customizer_disables($wp_customize)
    {
        global $wtp_security_plugin_disables;

        foreach ($wtp_security_plugin_disables as $key => $value) {
            // SETTING
            $wp_customize->add_setting(
                'wtp_disable_' . $key,
                array(
                    // 'capability'    => 'edit_theme_options',
                    'default' => '',
                    'sanitize_callback' => 'wtp_security_plugin_sanitize_checkbox'

                )
            );

            // CONTROL
            $wp_customize->add_control(
                'wtp_disable_' . $key,
                array(
                    'type'      => 'checkbox',
                    'section'   => 'wtp_security_plugin_disable_section',
                    'label'     => __($value, 'wtp'),
                )
            );
        }
    }
    add_action('customize_register', 'wtp_security_plugin_customizer_disables');


    // LOAD FILE IF DISABLED
    foreach ($wtp_security_plugin_disables as $key => $value) {
        if (get_theme_mod('wtp_disable_' . $key)) {
            require_once('disable/' . $key . '.php');
        }
    }
}