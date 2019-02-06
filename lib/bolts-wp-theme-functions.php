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
 * Construct a nav menu as a nested array of menu objects
 * @param array $elements
 * @param int $parent_id
 * @return array
 */

if ( !function_exists('bolts_build_nav_menu_tree') ) {
	function bolts_build_nav_menu_tree( &$elements, $parent_id = 0 ) {
		global $post;

		$branch = [];

		foreach ( $elements as &$element ) {
			$element->current_menu_item = false;

			if ( isset($post) && $element->object_id == $post->ID ) {
				$element->current_menu_item = true;
			}

			if ( $element->menu_item_parent == $parent_id ) {
				$children = bolts_build_nav_menu_tree( $elements, $element->ID );

				$element->children = false;
				if ( $children ) $element->children = $children;

				$branch[$element->ID] = $element;
				unset( $element );
			}
		}

		return $branch;
	}
}


/**
 * Return a nested nav menu array by menu location
 * @param string $location
 * @return array|null
 */

if ( !function_exists('get_menu_object') ) {
	function get_menu_object( $location = false ) {
		/* TODO: fail more gracefully if menu at specified location is not defined */
		global $post;

		if ( !$location ) $location = BOLTS_WP_DEFAULT_MENU_LOCATION;

		$locations = get_nav_menu_locations();
		if(empty($locations)) { return null; }
		$menu_id = $locations[ $location ];

		$menu_items = wp_get_nav_menu_items( $menu_id );

		return $menu_items ? bolts_build_nav_menu_tree( $menu_items, 0 ) : null;
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
 * Return .svg file parsed for inline use
 * @return string
 */
function get_svg( $asset, $fallback = false ) {
	$path = get_theme_dir() . '/public/images/' . $asset . '.svg';

	if ( !file_exists( $path ) && $fallback ) {
		$path = $fallback;
	}

	if ( !file_exists($path) ) {
		throw new Exception('Asset not found: ' . $path);
	}
	
	$inline = preg_replace('/\s*<\?xml.*?\?>\s*/si', '', file_get_contents($path));
	$inline = preg_replace('/\s*<!--.*?-->\s*/si', '', $inline);
	$inline = preg_replace('/\s*<title>.*?<\/title>\s*/si', '', $inline);
	$inline = preg_replace('/\s*<desc>.*?<\/desc>\s*/si', '', $inline);

	return $inline;
}

/**
 * Echo .svg file parsed for inline use
 */
function svg( $asset, $fallback = false ) {
	echo get_svg( $asset, $fallback );
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
 * Return a component, mostly used for AJAX
 */

if ( !function_exists('get_component') ) {
	function get_component($file, $args = false) {
		ob_start();

		component($file, $args);
		$component = ob_get_clean();

		return $component;
	}
}


/**
 * Loop through the layout items and output components from their data,
 * if a class and a class suffix is present wrap the component in a div.
 *
 * @param array|string $items - loops over items or just outputs string
 * @param string $item_class
 */

if ( !function_exists('layout_items') ) {
	function layout_items($items, $item_class = false) {
		if ( empty($items) ) return false;
		
		if ( array_keys($items) !== range(0, count($items) - 1) ) {

			layout_item($items);

		} else {

			foreach ( $items as $item ) {

				$modifier = !empty($item['modifier']) ? $item['modifier'] : '';

				echo !empty($item_class) ? '<div class="' . $item_class . ' ' . $modifier . '">' : '';

				layout_item($item);

				echo !empty($item_class) ? '</div>' : '';

			}
		}
	}
}

/**
 * Outputs string or component
 */
if ( !function_exists('layout_item') ) {
	function layout_item($item) {
		if ( is_string($item) ) {
			echo $item;
		} else {
			component($item['component'], $item['data']);
		}
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