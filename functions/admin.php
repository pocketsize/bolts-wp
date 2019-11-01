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

/**
 * Force the content editor to show on posts page
 */

function bolts_wp_force_posts_page_editor($post)
{
    if ($post->ID != get_option('page_for_posts')) {
        return;
    }

    remove_action('edit_form_after_title', '_wp_posts_page_notice');
    add_post_type_support('page', 'editor');
}
add_action('edit_form_after_title', 'bolts_wp_force_posts_page_editor', 0);

/**
 * Hide unwanted TinyMCE block formats
 */
function tiny_mce_remove_unused_formats($formats) {
    $formats['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;';
    return $formats;
}
add_filter('tiny_mce_before_init', 'tiny_mce_remove_unused_formats');
