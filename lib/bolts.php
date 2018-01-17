<?php
/*! bolts.php | Bolts v1.0 | MIT License | bolts.pocketsize.se
 *
 *  Developed by Pocketsize
 *  http://www.pocketsize.se/
 */

/**
 * Configuration
 */

// Set default Bolts WP options
$bolts_options = array(
	'BOLTS_DISABLE_ADMIN_BAR'    => false,
	'BOLTS_DISABLE_EMOJIS'       => false,
	'BOLTS_DISABLE_AUTO_UPDATES' => false,
	'BOLTS_DISABLE_EDITOR'       => false
);

foreach ( $bolts_options as $option => $value ) {
	if ( !defined($option) ) {
		define($option, $value);
	}
}

// Remove emoji code from header
if ( BOLTS_DISABLE_EMOJIS ) {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
}

// Remove admin bar on front end
if ( BOLTS_DISABLE_ADMIN_BAR ) {
	show_admin_bar(false);
}

// Disable automatic WordPress updates
if ( BOLTS_DISABLE_AUTO_UPDATES ) {
	define( 'AUTOMATIC_UPDATER_DISABLED', true );
	define( 'WP_AUTO_UPDATE_CORE', false );
}

if ( BOLTS_DISABLE_EDITOR ) {
	define( 'DISALLOW_FILE_EDIT', true );
}

/**
 * Theme support
 */

// Add support for featured images on posts
add_theme_support('post-thumbnails');

// Add support for title tag
add_theme_support( 'title-tag' );


/**
 * Setup
 */

function bolts_setup() {

	function bolts_head_cleanup() {
		remove_action( 'wp_head', 'index_rel_link' );
		remove_action( 'wp_head', 'feed_links_extra', 3 );
		remove_action( 'wp_head', 'rsd_link' );
		remove_action( 'wp_head', 'wlwmanifest_link' );
		remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
		remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
		remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
		remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 ); 
		remove_action( 'wp_head', 'wp_generator' );
		remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
	}
    add_action( 'init', 'bolts_head_cleanup');

    function bolts_rss_version() {
    	return '';
    }
    add_filter( 'the_generator', 'bolts_rss_version' );

    function bolts_remove_wp_widget_recent_comments_style() {
		if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
			remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
		}
	}
    add_filter( 'wp_head', 'bolts_remove_wp_widget_recent_comments_style', 1 );

    function bolts_remove_recent_comments_style() {
		global $wp_widget_factory;

		if ( isset( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'] ) ) {
			remove_action('wp_head', array(
				$wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
				'recent_comments_style'
			));
		}
	}
    add_action( 'wp_head','bolts_remove_recent_comments_style', 1 );

    function bolts_gallery_style( $css ) {
		return preg_replace( "!<style type='text/css'>(.*?)</style>!s", '', $css );
	}
    add_filter( 'gallery_style', 'bolts_gallery_style' );

}
add_action( 'after_setup_theme', 'bolts_setup', 15 );


/**
 * Theme functions
 */

function bolts_nav_menu( $args = false ) {
	$defaults = array(
		'theme_location' => 'main',
		'container'      => '',
		'menu_class'     => '',
		'echo'           => false,
		'fallback_cb'    => 'bolts_page_menu'
	);

	if ( !!$args ) $defaults = array_merge( $defaults, $args );

	$menu = wp_nav_menu( $defaults );

	echo str_replace( ' class=""', '', $menu );
}

function bolts_page_menu() {
	$menu = wp_page_menu(
		array(
			'echo'      => false,
			'show_home' => true
		)
	);

	echo str_replace( array('<nav>', '</nav>'), '', $menu );
}

function bolts_comment_form() {
	if ( locate_template('comment-form.php') != '' ) {
		get_template_part('comment-form');
	} else {
		comment_form();
	}
}

function bolts_hidden_comment_form_fields() {
	echo get_comment_id_fields($post->ID);
	wp_comment_form_unfiltered_html_nonce();
}