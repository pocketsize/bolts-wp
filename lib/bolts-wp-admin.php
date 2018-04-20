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

if ( BOLTS_WP_DISABLE_ADMIN_BAR ) {
	show_admin_bar( false );
}