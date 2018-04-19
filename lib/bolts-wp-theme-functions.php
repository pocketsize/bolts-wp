<?php

/**
 * Bolts WP v1.0 | MIT License
 *
 * Developed by Pocketsize
 * http://www.pocketsize.se/
 */


/**
 * Display a navigation menu (with default menu location)
 * @param array $args
 */

if ( !function_exists('nav_menu') ) {
	function nav_menu( $args = false ) {
		$defaults = array(
			'theme_location' => BOLTS_WP_DEFAULT_MENU_LOCATION,
			'container'      => '',
			'menu_class'     => '',
			'echo'           => false,
			'fallback_cb'    => 'page_menu'
		);

		if ( !!$args ) $defaults = array_merge( $defaults, $args );

		if ( !$defaults['theme_location'] ) return false;

		$menu = wp_nav_menu( $defaults );

		echo str_replace( ' class=""', '', $menu );
	}
}


/**
 * Displays or retrieves a list of pages with an optional home link
 */

if ( !function_exists('page_menu') ) {
	function page_menu( $args = false ) {
		$defaults = array(
			'echo'       => false,
			'show_home'  => true,
			'menu_class' => '',
		);

		if ( !!$args ) $defaults = array_merge( $defaults, $args );

		$menu = wp_page_menu( $defaults );

		echo str_replace( array('<div>', '</div>'), '', $menu );
	}
}


/**
 * Return the current theme directory
 * @return string
 */

if ( !function_exists('get_theme_dir') ) {
	function get_theme_dir() {
		return get_template_directory();
	}
}


/**
 * Print the current theme directory
 */

if ( !function_exists('theme_dir') ) {
	function theme_dir() {
		echo get_theme_dir();
	}
}


/**
 * Return the current theme directory URI
 * @return string
 */

if ( !function_exists('get_theme_uri') ) {
	function get_theme_uri() {
		return get_template_directory_uri();
	}
}


/**
 * Print the current theme directory URI
 */

if ( !function_exists('theme_uri') ) {
	function theme_uri() {
		echo get_theme_uri();
	}
}


/**
 * Return the path to a theme asset file
 * @return string
 */

if ( !function_exists('get_asset') ) {
	function get_asset( $asset, $fallback = false ) {
		$path = get_theme_dir() . '/public/' . $asset;

		if ( file_exists( $path ) ) {
			return get_theme_uri() . '/public/' . $asset . '?m=' . filemtime( $path );
		}

		return $fallback;
	}
}


/**
 * Print the path to a theme asset file
 */

if ( !function_exists('asset') ) {
	function asset( $asset, $fallback = false ) {
		echo get_asset( $asset, $fallback );
	}
}


/**
 * Include a template part from the components folder, with optional arguments
 */

// TODO: Add support for child theme priority

if ( !function_exists('component') ) {
	function component( $file, $args = false ) {
		$path = get_template_directory() . '/components/' . $file . '.php';

		global $posts, $post, $wp_did_header, $wp_query, $wp_rewrite, 
		       $wpdb, $wp_version, $wp, $id, $comment, $user_ID;

		if ( is_array( $wp_query->query_vars ) ) {
			extract( $wp_query->query_vars, EXTR_SKIP );
		}
		if ( isset( $s ) ) $s = esc_attr( $s );

		if ( is_array($args) ) extract( $args );

		require $path;
	}
}


/**
 * Register a custom post type
 */

if ( !function_exists('create_post_type') ) {
	function create_post_type(
		$slug,
		$singular,
		$plural,
		$icon = null,
		$custom_args = false
	) {
		$args = array(
			'labels' => array(
				'name' 	             => $plural,
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
			),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => $slug ),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'supports'           => array( 'title', 'editor', 'thumbnail' ),
			'menu_icon'          => $icon
		);

		if ( !!$custom_args ) $args = array_replace_recursive($args, $custom_args);

		return register_post_type( $slug, $args );
	}
}


/**
 * Register a custom taxonomy
 */

if ( !function_exists('create_taxonomy') ) {
	function create_taxonomy(
		$slug,
		$singular,
		$plural,
		$post_type = 'post',
		$custom_args = false
	) {
		$args = array(
			'labels' => array(
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
				'popular_items'	             => 'Popular ' . $plural, 
				'separate_items_with_commas' => 'Separate ' . lcfirst($plural) . ' with commas',
				'add_or_remove_items'        => 'Add or remove ' . lcfirst($plural),
				'choose_from_most_used'      => 'Show from most used',
				'not_found'                	 => 'No ' . lcfirst($plural) . ' found.',
			),
			'hierarchical'      => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => $slug )
		);

		if ( !!$custom_args ) $args = array_replace_recursive( $args, $custom_args );

		return register_taxonomy( $slug, $post_type, $args );
	}
}