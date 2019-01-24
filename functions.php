<?php

/**
 * Bolts WP v1.0 | MIT License
 *
 * Developed by Pocketsize
 * http://www.pocketsize.se/
 */

/**
 * Override default Bolts WP options
 */

define( 'BOLTS_WP_DISABLE_ADMIN_BAR',     true );
define( 'BOLTS_WP_DISABLE_EMOJIS',        true );
define( 'BOLTS_WP_EXCERPT_MORE',          '...' );
define( 'BOLTS_WP_ENQUEUE_JQUERY',        false );
define( 'BOLTS_WP_DEFAULT_MENU_LOCATION', 'main' );

/**
 * Require Bolts WP files
 */

require_once get_template_directory() . '/lib/bolts-wp.php';

bolts_wp_loader(array(
	'actions',
	'filters',
	'theme-support',
	'theme-functions',
	'content',
	'admin',
	'acf'
));

/**
 * Print stuff formatted
 */
function pad($val) {
	echo '<pre>';
	print_r($val);
	echo '</pre>';
} 

/**
 * Print stuff formatted and die
 */
function dad($val) {
	pad($val);
	die;
}


/**
 * Register default menu location
 */

register_nav_menu( BOLTS_WP_DEFAULT_MENU_LOCATION, 'Menu' );

/**
 * Require file for data fetching
 */
 require_once get_template_directory() . '/functions/data-fetching.php';

// The world is your oyster!