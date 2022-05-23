<?php

/**
 * Bolts WP v1.0.1
 *
 * Developed by Pocketsize
 * https://pocketsize.se
 */

/**
 * Clean up unnecessary WordPress bloat
 */

function bolts_wp_cleanup()
{
    function bolts_wp_head_cleanup()
    {
        remove_action('wp_head', 'index_rel_link');
        remove_action('wp_head', 'feed_links_extra', 3);
        remove_action('wp_head', 'rsd_link');
        remove_action('wp_head', 'wlwmanifest_link');
        remove_action('wp_head', 'parent_post_rel_link', 10, 0);
        remove_action('wp_head', 'start_post_rel_link', 10, 0);
        remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
        remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
        remove_action('wp_head', 'wp_generator');
        remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
    }

    function bolts_wp_remove_recent_comments_style()
    {
        global $wp_widget_factory;

        if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
            remove_action('wp_head', [
                $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
                'recent_comments_style'
            ]);
        }
    }

    function bolts_wp_rss_version()
    {
        return '';
    }

    function bolts_wp_remove_wp_widget_recent_comments_style()
    {
        if (has_filter('wp_head', 'wp_widget_recent_comments_style')) {
            remove_filter('wp_head', 'wp_widget_recent_comments_style');
        }
    }

    function bolts_wp_gallery_style($css)
    {
        return preg_replace("!<style type='text/css'>(.*?)</style>!s", '', $css);
    }
    
    function remove_block_library_css()
    {
        wp_dequeue_style('wp-block-library');
    }

    add_action('init', 'bolts_wp_head_cleanup');
    add_action('wp_head', 'bolts_wp_remove_recent_comments_style', 1);
    add_action('wp_enqueue_scripts', 'remove_block_library_css');

    add_filter('the_generator', 'bolts_wp_rss_version');
    add_filter('wp_head', 'bolts_wp_remove_wp_widget_recent_comments_style', 1);
    add_filter('gallery_style', 'bolts_wp_gallery_style');
}
add_action('after_setup_theme', 'bolts_wp_cleanup', 15);

/**
 * Make page content available in the global post object (outside the posts loop) on the posts archive page
 */

function set_posts_page_object()
{
    if (!(get_option('page_for_posts') && (is_home() || is_category()))) {
        return;
    }

    global $post;
    $post = get_post(get_option('page_for_posts'));

    setup_postdata($post);
}
add_action('wp', 'set_posts_page_object');
