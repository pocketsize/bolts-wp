<?php

/**
 * Bolts WP v1.0.0
 *
 * Developed by Pocketsize
 * http://www.pocketsize.se/
 */

/**
 * Include theme configuration
 */

require_once get_template_directory() . '/bolts-wp-config.php';

/**
 * Require Bolts WP
 */

require_once get_template_directory() . '/core/bolts-wp.php';

/**
 * Require project specific functions
 */

require_once get_theme_dir() . '/functions/acf.php';
require_once get_theme_dir() . '/functions/data.php';
require_once get_theme_dir() . '/functions/actions.php';
require_once get_theme_dir() . '/functions/filters.php';
require_once get_theme_dir() . '/functions/theme.php';
require_once get_theme_dir() . '/functions/admin.php';
require_once get_theme_dir() . '/functions/dev.php';
require_once get_theme_dir() . '/functions/shame.php';
