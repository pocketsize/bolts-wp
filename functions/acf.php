<?php

if (function_exists('acf_add_options_page')) {
    $options_page = acf_add_options_page([
        'page_title' => 'Options',
        'menu_title' => 'Options',
        'menu_slug'  => 'options'
    ]);

    acf_add_options_sub_page([
        'page_title'    => 'General Options',
        'menu_title'    => 'General',
        'menu_slug'     => 'general',
        'parent_slug'   => $options_page['menu_slug'],
    ]);

    acf_add_options_sub_page([
        'page_title'    => 'Header Options',
        'menu_title'    => 'Header',
        'menu_slug'     => 'header',
        'parent_slug'   => $options_page['menu_slug'],
    ]);

    acf_add_options_sub_page([
        'page_title'    => 'Footer Options',
        'menu_title'    => 'Footer',
        'menu_slug'     => 'footer',
        'parent_slug'   => $options_page['menu_slug'],
    ]);

    if (defined('WP_ENV') && in_array(WP_ENV, ['prod', 'production'])) {
        $custom_scripts = [
            'head' => get_field('head_scripts', 'option'),
            'body' => get_field('body_scripts', 'option')
        ];

        if (!empty($custom_scripts['head'])) {
            add_action('wp_head', function() use ($custom_scripts) {
                echo $custom_scripts['head'];
            });
        }

        if (!empty($custom_scripts['body'])) {
            add_action('wp_footer', function() use ($custom_scripts) {
                echo $custom_scripts['body'];
            });
        }
    }
}