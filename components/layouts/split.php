<?php 
/**
 * Split layout
 * 
 * Pretty straight forward. Either of the areas can be used 
 * as a grid by passing a fitting theme name and styling 
 * .layout-split-primary-inner or .layout-split-secondary-inner accordingly.
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
 * @param string $theme
 * 
 * @param array  $primary
 * @param string $primary[i].component - what component to use
 * @param string $primary[i].modifier  - optional, if set this component will be wrapped in div.layout-split-<modifier>
 * @param array  $primary[i].data
 * 
 * @param array  $secondary
 * @param string $secondary[i].component - what component to use
 * @param string $secondary[i].modifier  - optional, if set this component will be wrapped in div.layout-split-<modifier>
 * @param array  $secondary[i].data
 */

// Setting up a theme class used to give the grid different layouts
$theme       = !empty($theme) ? $theme : 'default';
$theme_class = 'is-theme-' . $theme;
?>

<div class="layout-split <?php echo $theme_class; ?>">
	<div class="layout-split-primary">
		<div class="layout-split-primary-inner">
			<?php layout_items($primary, 'layout-split-item'); ?>
		</div>
	</div>

	<div class="layout-split-secondary">
		<div class="layout-split-secondary-inner">
			<?php layout_items($secondary, 'layout-split-item'); ?>
		</div>
	</div>
</div>