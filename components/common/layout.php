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
                    <div class="layout-area <?php echo modifiers($area['modifiers'] ?? null, false); ?>" <?php echo attributes($area['attributes'] ?? null, false); ?>>
                        <?php if (!empty($area['subareas'])) : ?>
                            <div class="layout-subareas">
                                <?php foreach ($area['subareas'] as $subarea) : ?>
                                    <div class="layout-subarea <?php echo modifiers($subarea['modifiers'] ?? null, false); ?>" <?php echo attributes($subarea['attributes'] ?? null, false); ?>>
                                        <?php if (!empty($subarea['items'])) : ?>
                                            <div class="layout-items">
                                                <?php layout_items($subarea['items'], 'layout-item'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php elseif (!empty($area['items'])) : ?>
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