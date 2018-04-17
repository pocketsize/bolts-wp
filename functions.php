<?php

/* TODO: Should we really ship with these options? */

// Override default options
define( 'BOLTS_DISABLE_ADMIN_BAR',       true );
define( 'BOLTS_DISABLE_EMOJIS',          true );
define( 'BOLTS_ACF_FOOTER_OPTIONS_PAGE', true );

// Include the Bolts WP library
require_once get_template_directory() . '/lib/bolts.php';

// Register the menu position utilized by bolts_nav_menu()
register_nav_menu( 'main', 'Menu' );

/**
 * Theme functions
 */

// Return whether a post has a specific post type

function is_post_type( $post_type, $post = false ) {
	if ( !$post ) {
		global $post;
	} else if ( is_int( $post ) ) {
		$post = get_post( $post );
	}
	return $post->post_type == $post_type;
}

// Return the current theme directory

function get_theme_dir() {
	return get_template_directory();
}

// Print the current theme directory

function theme_dir() {
	echo get_theme_dir();
}

// Return the current theme directory url

function get_theme_uri() {
	return get_template_directory_uri();
}

// Print the current theme directory url

function theme_uri() {
	echo get_theme_uri();
}

// Return the excerpt for a post (automatic or manual)

function get_excerpt( $post_id = false, $words = 55, $more = '...' ) {
	if ( !!$post_id ) {
		$post = get_post( $post_id );
	} else {
		global $post;
	}

	if ( !empty($post->post_excerpt) ) return $post->post_excerpt;

	$filtered = apply_filters( 'the_content', $post->post_content );
	return wp_trim_words( strip_tags($filtered), $words, $more );
}

// Print the excerpt for a post (automatic or manuall)

function excerpt( $post_id = false, $words = 55, $more = '...' ) {
	echo get_excerpt( $post_id, $words, $more );
}

// Return the url for the featured image of a post

function get_featured_image( $post_id = false, $size = 'full', $fallback = false ) {
	if ( !$post_id ) {
		global $post;
		if ( !$post ) return $fallback;
		$post_id = $post->ID;
	}
	
	if ( has_post_thumbnail( $post_id ) ) {
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), $size );
		if ( !empty($image[0]) ) return $image[0];
	}

	return $fallback;
}

// Print the url for the featured image of a post

function featured_image( $post_id = false, $size = 'full', $fallback = false ) {
	echo get_featured_image( $post_id, $size, $fallback );
}

// Return the path to a theme asset file

function get_asset( $asset, $fallback = false ) {
	$path = get_theme_dir() . '/public/' . $asset;

	if ( file_exists( $path ) ) {
		return get_theme_uri() . '/public/' . $asset . '?m=' . filemtime( $path );
	}

	return $fallback;
}

// Print the path to a theme asset file

function asset( $asset, $fallback = false ) {
	echo get_asset( $asset, $fallback );
}

// Return the path to an attachment in the media library

function get_media( $attachment_id, $size = 'full', $fallback = false ) {
	$image = wp_get_attachment_image_src( $attachment_id, $size );
	if ( !!$image ) return $image[0];
	return $fallback;
}

// Print the path to an attachment in the media library

function media( $attachment_id, $size = 'full', $fallback = false ) {
	echo get_media( $attachment_id, $size, $fallback );
}

// Include a template part from the components subfolder, with optional arguments

function component( $file, $args = false ) {

	// Set component path
	$path = get_template_directory() . '/components/' . $file . '.php';

	// Make all WordPress variables available
	global $posts, $post, $wp_did_header, $wp_query, $wp_rewrite, 
	       $wpdb, $wp_version, $wp, $id, $comment, $user_ID;

	// Define all WP query vars as variables
	if ( is_array( $wp_query->query_vars ) ) {
		extract( $wp_query->query_vars, EXTR_SKIP );
	}
	if ( isset( $s ) ) $s = esc_attr( $s );

	// Define all arguments as variables
	if ( is_array($args) ) extract( $args );

	// Include the component
	require $path;

}

/**
 * Custom hooks
 */

// Set default image sizes
function set_image_sizes( $sizes ) {
	return [
		'small'  => [
			'width'  => 640,
			'height' => 640,
			'crop'   => false
		],
		'medium' => [
			'width'  => 1280,
			'height' => 1280,
			'crop'   => false
		],
		'large'  => [
			'width'  => 1920,
			'height' => 1920,
			'crop'   => false
		],
		'xlarge' => [
			'width'  => 2560,
			'height' => 2560,
			'crop'   => false
		]
	];
}
add_filter('intermediate_image_sizes_advanced', 'set_image_sizes');

// End excerpts with an ellipsis
function custom_excerpt_more($more) {
	return '...';
}
add_filter('excerpt_more', 'custom_excerpt_more');

// Enqueue styles
function enqueue_styles() {
	wp_enqueue_style( 'main', get_asset('css/main.css'), null, null );
}
add_action( 'wp_enqueue_scripts', 'enqueue_styles' );

// Enqueue scripts
function enqueue_scripts() {
	wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'main', get_asset('js/main.js'), null, null, true );
}
add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );

// Wrap video elements in a div
function wrap_video_elements( $html ) {
	return '<div class="video-container">' . $html . '</div>';
}
add_filter( 'embed_oembed_html', 'wrap_video_elements', 10, 3 );
add_filter( 'video_embed_html', 'wrap_video_elements' );

if ( function_exists('acf_add_options_page') && BOLTS_ACF_FOOTER_OPTIONS_PAGE ) {
 
	$option_page = acf_add_options_page(array(
		'page_title' => 'Footer options',
		'menu_title' => 'Footer',
		'menu_slug'  => 'footer',
		'icon_url'   => 'dashicons-welcome-widgets-menus'
	));
 
}