<?php 

/**
 * Getting data from ACF page builder
 */
function prepare_page_builder_data () {
	$page_builder = get_field('page-builder');
	if(empty($page_builder)) return ['data' => false];
	$data = [];

	foreach($page_builder as $section) {
		$component = $section['acf_fc_layout'];
		unset($section['acf_fc_layout']);

		$data[] = [
			'component' => 'builder/' . $component,
			'data' => $section
		];
	}

	return ['data' => $data];
}

/**
 * Pair an array of componentless data entries with a component
 */

function add_component_to_data_entries($data_entries, $component) {
	if ( !$data_entries || !$component || !is_array($data_entries) ) return false;

	$result = [];

	if ( !empty($data_entries) ) {
		foreach ($data_entries as $data) {
			$result[] = [
				'component' => $component,
				'data'      => $data
			];
		}
	}

	return $result;
}

/**
 * Reformat an array of posts so that each of them can be passed to the overview component
 */

function prepare_posts_for_archive($post_type = 'post') {
	$items = [];

	$posts = get_posts([
		'post_status' => 'publish',
		'posts_per_page' => -1,
		'post_type' => $post_type
	]);

	foreach ( $posts as $i => $post ) {
		$items[$i] = [
			'image_url' => get_featured_image($post->ID),
			'title'     => get_title($post->ID),
			'content'   => get_excerpt($post->ID, true),
			'link_url'  => get_permalink($post->ID)
		];
	}

	return $items;
}

/**
 * Get and format search results from the loop
 */

function prepare_loop_for_search_results() {
	$items = [];

	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();
			
			$items[] = [
				'id'        => $post->ID,
				'type'      => $post->post_type,
				'title'     => get_title($post->ID),
				'content'   => get_content($post->ID),
				'date'      => get_the_date(null, $post->ID),
				'permalink' => get_permalink($post->ID),
				'author'    => get_author($post->ID)
			];
		}
	}
}