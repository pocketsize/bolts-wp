<?php

/**
 * Bolts WP v1.0.1
 *
 * Developed by Pocketsize
 * https://pocketsize.se
 */

/**
 * Disable all updates to reinforce composer workflow
 */

if (!defined('WP_AUTO_UPDATE_CORE')) {
    define('WP_AUTO_UPDATE_CORE', false);
}

if (!defined('AUTOMATIC_UPDATER_DISABLED')) {
    define('AUTOMATIC_UPDATER_DISABLED', true);
}

add_filter('auto_update_plugin', '__return_false');
add_filter('auto_update_theme', '__return_false');

function hide_update_notice()
{
    remove_action('admin_notices', 'update_nag', 3);
}
add_action('admin_head', 'hide_update_notice', 1);

function remove_updates()
{
    global $wp_version;

    return (object)[
        'last_checked'    => time(),
        'version_checked' => $wp_version
    ];
}
add_filter('pre_site_transient_update_core', 'remove_updates');
add_filter('pre_site_transient_update_plugins', 'remove_updates');
add_filter('pre_site_transient_update_themes', 'remove_updates');

add_filter('update_footer', '__return_empty_string', 11);

function remove_update_core_menu_item()
{
    remove_submenu_page('index.php', 'update-core.php');
}
add_action('admin_head', 'remove_update_core_menu_item');
