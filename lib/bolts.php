<?php
/*! bolts.php | Bolts v0.2.0 | MIT License | bolts.pocketsize.se
 *
 *  Developed by Pocketsize
 *  http://www.pocketsize.se/
 */

$bolts_options = array(
	'BOLTS_DISABLE_ADMIN_BAR' => false,
	'BOLTS_DISABLE_EMOJIS'    => false
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

// Add support for featured images on posts
add_theme_support('post-thumbnails');

// Add support for title tag
add_theme_support( 'title-tag' );

add_action( 'after_setup_theme', 'bolts_setup', 15 );

function bolts_setup() {
    add_action( 'init',          'bolts_head_cleanup');
    add_filter( 'the_generator', 'bolts_rss_version' );
    add_filter( 'wp_head',       'bolts_remove_wp_widget_recent_comments_style', 1 );
    add_action( 'wp_head',       'bolts_remove_recent_comments_style', 1 );
    add_filter( 'gallery_style', 'bolts_gallery_style' );
}

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

function bolts_rss_version() { return ''; }

function bolts_remove_wp_widget_recent_comments_style() {
	if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
		remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
	}
}

function bolts_remove_recent_comments_style() {
	global $wp_widget_factory;

	if ( isset( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'] ) ) {
		remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
	}
}

function bolts_gallery_style( $css ) {
	return preg_replace( "!<style type='text/css'>(.*?)</style>!s", '', $css );
}

function bolts_nav_menu( $args = false ) {
	$defaults = array(
		'theme_location'  => 'main',
		'container'       => '',
		'menu_class'      => '',
		'echo'            => false,
		'fallback_cb'     => 'bolts_page_menu'
	);

	if ( !!$args ) $defaults = array_merge( $defaults, $args );

	$menu = wp_nav_menu( $defaults );

	echo str_replace( ' class=""', '', $menu );
}

function bolts_page_menu() {
	$menu = wp_page_menu(
		array(
			'echo'            => false,
			'show_home'       => true
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

function bolts_title() {
	if ( !is_front_page() ) wp_title('-', true, 'right');
	bloginfo('name');
}

function component( $file, $args = false ) {
	// Set component path
	$path = 'components/' . $file . '.php';

	// Check if template file exists
	if ( !file_exists($path) ) {
		throw new Exception( 'Component "' . $path . '" not found.' );
	}

	// Parse component file
	$template = file_get_contents( $path );

	// Find all variables in the component
	preg_match_all( '/\$([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)/', $template, $tags );

	// Default all undefined template tags to false
	if ( count( $tags[0] ) ) {
		for ( $i = 0; $i < count( $tags[0] ); $i++ ) {
			if ( !isset( $args[ $tags[1][$i] ] ) ) {
				$args[ $tags[1][$i] ] = false;
			}
		}
	}

	// Define all args as variables
	if ( !!$args ) extract( $args );

	// Include the component
	include 'components/' . $file . '.php';

}