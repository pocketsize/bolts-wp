<?php

// Override default options
define( 'BOLTS_DISABLE_ADMIN_BAR', true );
define( 'BOLTS_DISABLE_EMOJIS',    true );

// Include the Bolts WP library
require_once get_template_directory() . '/lib/bolts.php';

// End excerpts with an ellipsis
function custom_excerpt_more($more) {
	return '...';
}
add_filter('excerpt_more', 'custom_excerpt_more');

// Register the menu position utilized by bolts_nav_menu()
register_nav_menu( 'main', 'Main Menu' );

/**
* Custom functions
**/

// Print get_template_directory_uri()

function theme_uri() {
	echo get_template_directory_uri();
}

// Get the featured image URL for the specified post id, if no post is passed, the current post is used.
// Falls back to $fallback (if set), if no image was found

function featured_image( $post_id = false, $size = 'full', $fallback = false ) {
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

/**
* Custom hooks
**/

// Enqueue styles
function enqueue_styles() {
	wp_enqueue_style('style', get_template_directory_uri() . '/public/css/style.css');
}
add_action( 'wp_enqueue_scripts', 'enqueue_styles' );

// Enqueue scripts
function enqueue_scripts() {
	wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'app', get_template_directory_uri() . '/public/js/main.js' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );

function is_post_type( $post_type, $post = false ) {
	if ( !$post ) {
		global $post;
	} else if ( is_int( $post ) ) {
		$post = get_post( $post );
	}
	return $post->post_type == $post_type;
}

function hidden_comment_form_fields() {
	echo get_comment_id_fields($post->ID);
	wp_comment_form_unfiltered_html_nonce();
}

function has_more_posts() {
	global $wp_query;
	return $wp_query->found_posts > get_option('posts_per_page');
}

function bolts_load_more_posts( $query = false ) {
	if ( !$query ) {
		global $wp_query;
		$query = array();

		foreach ( $wp_query->query_vars as $var => $val ) {
			if ( !empty($val) ) $query[ $var ] = $val;
		}
	}

	$posts_per_page = $query['posts_per_page'] ? $query['posts_per_page'] : get_option('posts_per_page');
	
	$query['posts_per_page'] = 999999;
	if ( !$query['offset'] ) $query['offset'] = $posts_per_page;

	$posts = get_posts( $query );

	foreach ( $posts as $k => $post ) {
		$posts[$k]->title     = $post->post_title;
		$posts[$k]->content   = $post->post_content;
		$posts[$k]->excerpt   = wpautop(wp_trim_words(strip_shortcodes( $post->post_content )));
		$posts[$k]->permalink = get_the_permalink( $post->ID );
		$posts[$k]->date      = get_the_time(get_option('date_format'), $post->ID);
		$posts[$k]->author    = get_the_author_meta('user_nicename', $post->post_author);
	}

	return $posts;
}

function bolts_load_more( $selector = '.posts', $args = array() ) {
	$defaults = array(
		'postsPerPage' => (int)get_option('posts_per_page'),
		'selector'     => '> *',
		'loadOnScroll' => false,
		'scrollOffset' => 0,
		'posts'        => false,
		'onRender'     => false,
		'onComplete'   => false,
		'template'     => false
	);

	$args = array_merge( $defaults, $args );

	if ( !$args['posts'] ) {
		$args['posts'] = bolts_load_more_posts();
	}

	echo '<script>jQuery("' . $selector . '").loadMore(' . json_encode($args) . ');</script>';
}