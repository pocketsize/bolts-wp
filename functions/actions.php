<?php

/**
 * Enqueue styles
 */

function bolts_wp_enqueue_styles()
{
    wp_enqueue_style('style', get_asset('css/style.css'), null, null);
}
add_action('wp_enqueue_scripts', 'bolts_wp_enqueue_styles');

/**
 * Enqueue scripts
 */

function bolts_wp_enqueue_scripts()
{
    wp_register_script('app', get_asset('js/app.js'), null, null, true);

    wp_localize_script('app', 'ajaxUrl', admin_url('admin-ajax.php'));

    wp_enqueue_script('app');
}
add_action('wp_enqueue_scripts', 'bolts_wp_enqueue_scripts');

/**
 * Disable emojis (define in functions.php to override)
 */

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

/**
 * Disable author queries that uses numerical user ID's (to prevent user enumeration exploits)
 */

if (!is_admin() && isset($_GET['author'])) {
    wp_redirect(home_url());
    die();
}

/**
 * Filtering all queries and triggering a 404 on all
 * unwanted "auto generated" endpoints.
 */

function cleanup_queries($query)
{
    if (is_category() || is_tag() || is_date() || is_author()) {
        global $wp_query;
        $wp_query->set_404();
    }
}
add_action('parse_query', 'cleanup_queries');