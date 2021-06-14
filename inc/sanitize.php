<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

//checkbox sanitization function
if (!function_exists('wtp_security_plugin_sanitize_checkbox')) {
    function wtp_security_plugin_sanitize_checkbox($input)
    {
        // https://gist.github.com/ajskelton/740788f98df3283355dd7e0c2f5abb2a
        // return ( isset( $input ) ? true : false );
        return ((isset($input) && true == $input) ? true : false);
    }
}

//radio box sanitization function
if (!function_exists('wtp_security_plugin_sanitize_radio')) {
    function wtp_security_plugin_sanitize_radio($input, $setting)
    {

        //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
        $input = sanitize_key($input);

        //get the list of possible radio box options 
        $choices = $setting->manager->get_control($setting->id)->choices;

        //return input if valid or return default option
        return (array_key_exists($input, $choices) ? $input : $setting->default);
    }
}

//select sanitization function
if (!function_exists('wtp_security_plugin_sanitize_select')) {
    function wtp_security_plugin_sanitize_select($input, $setting)
    {

        //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
        $input = sanitize_key($input);

        //get the list of possible select options 
        $choices = $setting->manager->get_control($setting->id)->choices;

        //return input if valid or return default option
        return (array_key_exists($input, $choices) ? $input : $setting->default);
    }
}
