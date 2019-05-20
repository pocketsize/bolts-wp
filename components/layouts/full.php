<?php
/**
 * Full layout
 *
 * Pretty straight forward. Can be used as a grid by passing a
 * fitting theme name and styling .layout-full-inner accordingly.
 *
 * This file is also an example of how a layout component
 * is written:
 *
 * - Documentation at the top, with all params as a minimum
 * - Nullchecks and simple data transformation
 * - Markup with as little logic as possible
 *
 * Layout components are dependent on the function layout_items()
 * See it documented in 'lib/bolts-wp-theme-functions.php'
 *
 * Lets check it out
 *
 * @param string $theme - "default"
 * @param string $modifier
 * @param string $attributes
 * @param array  $content
 */

$attributes = attributes($attributes ?? '');
$modifier   = modifier($theme ?? null, $modifier ?? null);
?>

<div class="layout-full <?php echo $modifier; ?>" <?php echo $attributes; ?>>
    <div class="layout-full-inner">
    	<div class="layout-full-items">
        	<?php layout_items($content, 'layout-full-item'); ?>
        </div>
    </div>
</div>