<?php

/**
 * Add support for featured images on posts
 */

add_theme_support('post-thumbnails');

/**
 * Add support for title tag
 */

add_theme_support('title-tag');

/**
 * Register default menu location
 */

register_nav_menu(BOLTS_WP_DEFAULT_MENU_LOCATION, 'Menu');

/**
 * Register a custom post type
 */

if (!function_exists('create_post_type')) {
    function create_post_type(
        $slug,
        $singular,
        $plural,
        $icon = null,
        $custom_args = false
    ) {
        $args = [
            'labels' => [
                'name'               => $plural,
                'singular_name'      => $singular,
                'menu_name'          => $plural,
                'name_admin_bar'     => $singular,
                'add_new'            => 'Add New',
                'add_new_item'       => 'Add New ' . $singular,
                'new_item'           => 'New ' . $singular,
                'edit_item'          => 'Edit ' . $singular,
                'view_item'          => 'View ' . $singular,
                'all_items'          => 'All ' . $plural,
                'search_items'       => 'Search ' . $plural,
                'parent_item_colon'  => 'Parent' . $plural . ':',
                'not_found'          => 'No ' . lcfirst($plural) . ' found.',
                'not_found_in_trash' => 'No ' . lcfirst($plural) . ' found in trash.'
            ],
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => [ 'slug' => $slug ],
            'capability_type'    => 'post',
            'has_archive'        => false,
            'supports'           => [ 'title', 'editor', 'thumbnail' ],
            'menu_icon'          => $icon
        ];

        if (!!$custom_args) {
            $args = array_replace_recursive($args, $custom_args);
        }

        return register_post_type($slug, $args);
    }
}

/**
 * Register a custom taxonomy
 */

if (!function_exists('create_taxonomy')) {
    function create_taxonomy(
        $slug,
        $singular,
        $plural,
        $post_type = 'post',
        $custom_args = false
    ) {
        $args = [
            'labels' => [
                'name'                       => $plural,
                'singular_name'              => $singular,
                'menu_name'                  => $plural,
                'all_items'                  => 'All ' . $plural,
                'edit_item'                  => 'Edit ' . $singular,
                'view_item'                  => 'View ' . $singular,
                'update_item'                => 'Update ' . $singular,
                'add_new_item'               => 'Add New ' . $singular,
                'new_item_name'              => 'New' . $singular . 'Name',
                'parent_item'                => 'Parent ' . $singular,
                'parent_item_colon'          => 'Parent ' . $singular . ':',
                'search_items'               => 'Search ' . $plural,
                'popular_items'              => 'Popular ' . $plural,
                'separate_items_with_commas' => 'Separate ' . lcfirst($plural) . ' with commas',
                'add_or_remove_items'        => 'Add or remove ' . lcfirst($plural),
                'choose_from_most_used'      => 'Show from most used',
                'not_found'                  => 'No ' . lcfirst($plural) . ' found.',
            ],
            'hierarchical'      => true,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => [ 'slug' => $slug ]
        ];

        if (!!$custom_args) {
            $args = array_replace_recursive($args, $custom_args);
        }

        return register_taxonomy($slug, $post_type, $args);
    }
}
