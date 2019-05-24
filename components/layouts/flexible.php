<?php
/**
 * Flexible layout
 *
 * @param string $theme - "default"
 * @param string $modifier
 * @param string $attributes
 *
 * @param array $areas
 */

$attributes = attributes($attributes ?? '');
$modifiers  = modifiers($modifiers ?? null, $theme ?? null);
?>

<div class="layout-flexible <?php echo $modifier; ?>" <?php echo $attributes; ?>>
    <div class="layout-flexible-inner">
        <?php if (!empty($areas)) : ?>
            <div class="layout-flexible-areas">
                <?php foreach($areas as $area) : ?>
                    <div class="layout-flexible-area <?php echo !empty($area['modifier']) ? $area['modifier'] : ''; ?>">
                        <?php if (!empty($area['items'])) : ?>
                            <div class="layout-flexible-items">
                                <?php layout_items($area['items'], 'layout-flexible-item'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>