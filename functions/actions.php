<?php

/**
 * Enqueue styles
 */

function bolts_wp_enqueue_styles()
{
    wp_enqueue_style('main', get_asset('css/main.css'), null, null);
}
add_action('wp_enqueue_scripts', 'bolts_wp_enqueue_styles');

/**
 * Enqueue scripts
 */

function bolts_wp_enqueue_scripts()
{
    //wp_enqueue_script('jquery');
    wp_enqueue_script('main', get_asset('js/main.js'), null, null, true);
}
add_action('wp_enqueue_scripts', 'bolts_wp_enqueue_scripts');

/**
 * Disable emojis (define in functions.php to override)
 */

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

/**
 * Disables WordPress Rest API for external requests
 */

function restrict_rest_api_to_localhost()
{
    $whitelist = ['127.0.0.1', '::1'];

    if (!in_array($_SERVER['REMOTE_ADDR'], $whitelist)) {
        wp_send_json_error([
            'code'    => 'json_disabled',
            'message' => 'The JSON API is disabled on this site.'
        ]);

        die();
    }
}
add_action('rest_api_init', 'restrict_rest_api_to_localhost', 1);
