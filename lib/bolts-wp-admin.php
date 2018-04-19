<?php

/**
 * Bolts WP v1.0 | MIT License
 *
 * Developed by Pocketsize
 * http://www.pocketsize.se/
 */


/**
 * Disable the WordPress admin bar on the front end
 */

if ( BOLTS_DISABLE_ADMIN_BAR ) {
	show_admin_bar( false );
}


/**
 * Disable automatic WordPress updates
 */

if ( BOLTS_DISABLE_AUTO_UPDATES ) {
	define( 'AUTOMATIC_UPDATER_DISABLED', true );
	define( 'WP_AUTO_UPDATE_CORE', false );
}