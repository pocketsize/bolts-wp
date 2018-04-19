<?php

/**
 * Bolts v1.0 | MIT License
 *
 * Developed by Pocketsize
 * http://www.pocketsize.se/
 */

/**
 * Set default image sizes
 */

function bolts_wp_set_image_sizes( $sizes ) {
	return array(
		'small'  => array(
			'width'  => 640,
			'height' => 640,
			'crop'   => false
		),
		'medium' => array(
			'width'  => 1280,
			'height' => 1280,
			'crop'   => false
		),
		'large'  => array(
			'width'  => 1920,
			'height' => 1920,
			'crop'   => false
		),
		'xlarge' => array(
			'width'  => 2560,
			'height' => 2560,
			'crop'   => false
		)
	);
}
add_filter( 'intermediate_image_sizes_advanced', 'bolts_wp_set_image_sizes' );


/**
 * Customize the excerpt suffix
 */

function bolts_wp_excerpt_more() {
	return BOLTS_WP_EXCERPT_MORE;
}
add_filter('excerpt_more', 'bolts_wp_excerpt_more');


/**
 * Customize the excerpt length
 */

function bolts_wp_excerpt_words() {
	return BOLTS_WP_EXCERPT_WORDS;
}
add_filter( 'excerpt_length', 'bolts_wp_excerpt_words', 999 );


/**
 * Customize the content read more link
 */

function bolts_wp_read_more_link() {
	return BOLTS_WP_EXCERPT_MORE . ' <a href="' . get_permalink() . '" class="more-link">Read More</a>';
}
add_filter( 'the_content_more_link', 'bolts_wp_read_more_link' );


/**
 * Wrap embed elements in a div
 */

function bolts_wp_wrap_embed_elements( $html ) {
	return '<div class="embed-wrapper">' . $html . '</div>';
}
add_filter( 'embed_oembed_html', 'bolts_wp_wrap_embed_elements', 10, 3 );
add_filter( 'video_embed_html', 'bolts_wp_wrap_embed_elements' );


/**
 * Add a class to all paragraphs containing images
 */

function bolts_wp_add_image_wrapper_class( $content ) {
	return preg_replace( '/(<p[^>]*)(\>.*)(\s*)(\<img.*)(\s*)(<\/p>)/im', '$1 class="image-wrapper"$2$3$4', $content);
}
add_filter( 'the_content', 'bolts_wp_add_image_wrapper_class', 20 );