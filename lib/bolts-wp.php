<?php

/**
 * Bolts WP v1.0 | MIT License
 *
 * Developed by Pocketsize
 * http://www.pocketsize.se/
 */

/**
 * Default configuration constants, define these in functions.php to override
 */

$bolts_wp_options = array(
	'BOLTS_WP_DISABLE_ADMIN_BAR'     => false,
	'BOLTS_WP_DISABLE_EMOJIS'        => false,
	'BOLTS_WP_DISABLE_AUTO_UPDATES'  => false,
	'BOLTS_WP_DISABLE_EDITOR'        => false,
	'BOLTS_WP_EXCERPT_WORDS'         => 55,
	'BOLTS_WP_EXCERPT_MORE'          => '[...]',
	'BOLTS_WP_ENQUEUE_JQUERY'        => false,
	'BOLTS_WP_DEFAULT_MENU_LOCATION' => false
);

foreach ( $bolts_wp_options as $option => $value ) {
	if ( !defined($option) ) {
		define( $option, $value );
	}
}

/**
 * Load Bolts WP files
 * @param array $files
 */

function bolts_wp_loader( $files = array() ) {
	if ( !count($files) ) return false;

	$template_directory = get_template_directory();

	foreach ( $files as $file ) {
		if ( file_exists( $template_directory . '/lib/bolts-wp-' . $file . '.php' ) ) {
			require_once $template_directory . '/lib/bolts-wp-' . $file . '.php';
		}
	}
}

// TODO: Maybe add get_date (and how would we do with date() ?)