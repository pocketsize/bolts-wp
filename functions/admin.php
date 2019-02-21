<?php

/**
 * Hide admin bar on front end
 */

show_admin_bar(false);

/**
 * Restrict editor capabilities
 */

$role_object = get_role('editor');
$role_object->add_cap('edit_theme_options');

function remove_admin_menu_items()
{
    if (current_user_can('editor')) {
        // Hide the theme selection submenu
        remove_submenu_page('themes.php', 'themes.php');

        // Hide the widgets submenu
        remove_submenu_page('themes.php', 'widgets.php');

        // Hide the customizer submenu
        remove_submenu_page('themes.php', 'customize.php?return=%2Fwp%2Fwp-admin%2Fadmin.php%3Fpage%3Dheader');

        // Hide the customizer submenu
        remove_submenu_page('themes.php', 'customize.php?return=%2Fwp-admin%2Ftools.php');
    }
}
add_action('admin_head', 'remove_admin_menu_items');
