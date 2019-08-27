<?php
/**
 * Layout
 *
 * @param string $theme - "default"
 * @param string $modifiers
 * @param string $attributes
 *
 * @param array $areas
 * @param array $items
 */

$attributes = attributes($attributes ?? '');
$modifiers  = modifiers($modifiers ?? null, $theme ?? null);

$areas = !empty($areas) ? $areas : false;
$items = !empty($items) ? $items : false;
?>

<div class="layout <?php echo $modifiers; ?>" <?php echo $attributes; ?>>
    <div class="layout-inner">
        <?php if (!empty($areas)) : ?>
            <div class="layout-areas">
                <?php foreach ($areas as $area) : ?>
                    <div class="layout-area <?php modifiers($area['modifiers'] ?? null, false); ?>">
                        <?php if (!empty($area['items'])) : ?>
                            <div class="layout-items">
                                <?php layout_items($area['items'], 'layout-item'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php elseif (!empty($items)) : ?>
            <div class="layout-items">
                <?php layout_items($items, 'layout-item'); ?>
            </div>
        <?php endif; ?>
    </div>
</div>