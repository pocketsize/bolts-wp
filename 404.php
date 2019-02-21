<?php

if ( false != $post_id = get_field('404_page', 'option') ) {
	global $post;

	// Get 404 page post object
	$post_object = get_post($post_id);

	// Get 404 page template
	$template = get_page_template_slug( $post_id );

	// Set $post variable to 404 page post object
	$post = $post_object;

	// Set up 404 page post data
	setup_postdata($post);

	// Include 404 page post template
	include(get_theme_dir() . '/' . $template); die();
} else {
	get_header();

	component('layouts/full', [
		'content' => [
			'component' => 'content',
			'data' => [
				'title'   => '404',
				'content' => '<p>We could not find what you were looking for</p>'
			]
		]
	]);

	get_footer();
}