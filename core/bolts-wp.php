<?php

/**
 * Bolts WP v1.0.1
 *
 * Developed by Pocketsize
 * https://pocketsize.se
 */

/**
 * Default configuration constants, define these in bolts-wp-config.php to override
 */

$bolts_wp_options = [
    'BOLTS_WP_DEFAULT_MENU_LOCATION' => false
];

foreach ($bolts_wp_options as $option => $value) {
    if (!defined($option)) {
        define($option, $value);
    }
}

require_once get_template_directory() . '/core/bolts-wp-actions.php';
require_once get_template_directory() . '/core/bolts-wp-theme.php';
require_once get_template_directory() . '/core/bolts-wp-content.php';
require_once get_template_directory() . '/core/bolts-wp-admin.php';
require_once get_template_directory() . '/core/bolts-wp-helpers.php';
