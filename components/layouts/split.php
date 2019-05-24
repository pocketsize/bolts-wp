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
 * @param string $theme - "default"
 * @param string $modifier
 * @param string $attributes
 *
 * @param array  $primary
 * @param string $primary[i].component - what component to use
 * @param array  $primary[i].data
 *
 * @param array  $secondary
 * @param string $secondary[i].component - what component to use
 * @param array  $secondary[i].data
 */

$attributes = attributes($attributes ?? '');
$modifiers  = modifiers($modifiers ?? null, $theme ?? null);

$primary    = !empty($primary)   ? $primary   : false;
$secondary  = !empty($secondary) ? $secondary : false;
?>

<div class="layout-split <?php echo $modifiers; ?>" <?php echo $attributes; ?>>
    <div class="layout-split-inner">
        <div class="layout-split-items is-primary">
            <?php if (!empty($primary)) : ?>
                <?php layout_items($primary, 'layout-split-item'); ?>
            <?php endif; ?>
        </div>

        <div class="layout-split-items is-secondary">
            <?php if (!empty($secondary)) : ?>
                <?php layout_items($secondary, 'layout-split-item'); ?>
            <?php endif; ?>
        </div>
    </div>
</div>