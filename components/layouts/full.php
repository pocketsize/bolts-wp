<?php
/**
 * Fullwidth layout
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
 * @param array  $content
 *
 * @param string $theme - "default"
 * @param string $modifier
 */

// Setting up a theme class used to give the grid different layouts
$theme       = !empty($theme) ? $theme : 'default';
$theme_class = 'is-theme-' . $theme;
$modifier    = !empty($modifier) ? $modifier : '';
?>

<div class="layout-full <?php echo $theme_class; ?> <?php echo $modifier; ?>">
    <div class="layout-full-inner">
        <?php layout_items($content, 'layout-full-item'); ?>
    </div>
</div>