<?php
/**
 * Tabs
 *
 * @param string $attributes
 * @param string $theme
 * @param string $modifiers
 *
 * @param array  $items
 * @param string $items[i][label] - label on toggle button
 * @param array  $items[i][items]
 */

$attributes = get_attributes($attributes ?? '');
$attributes['data-bolts-selector'] = 'tabs';
$modifiers  = modifiers($modifiers ?? null, $theme ?? null);
?>

<?php if (!empty($items)) : ?>
    <div class="tabs <?php echo $modifiers; ?>" <?php echo attributes($attributes); ?>>
        <div class="tabs-inner">
            <div class="tabs-toggles">
                <?php foreach ($items as $i => $item) : ?>
                    <?php $toggle_label = !empty($item['label']) ? $item['label'] : false; ?>
                    <div class="tabs-toggle">
                        <?php component('forms/button', [
                            'theme'      => 'tabs-toggle',
                            'content'    => $toggle_label,
                            'attributes' => [
                                'data-bolts-scope'        => 'tabs',
                                'data-bolts-selector'     => 'toggle',
                                'data-bolts-action'       => 'toggle',
                                'data-bolts-value'        => 'active',
                                'data-bolts-target'       => 'item',
                                'data-bolts-set'          => true,
                                'data-bolts-unique'       => true,
                                'data-bolts-index'        => true,
                                'data-bolts-self'         => true,
                                'data-bolts-state-active' => $i == 0
                            ]
                        ]); ?>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="tabs-items">
                <?php foreach ($items as $i => $item) : ?>
                    <?php $item_attributes = get_attributes($item['attributes'] ?? null, [
                        'data-bolts-state-active' => $i == 0,
                        'data-bolts-selector'     => 'item'
                    ]); ?>
                    <div class="tabs-item" <?php echo attributes($item_attributes); ?>>
                        <div class="tabs-item-inner">
                            <?php layout_items($item['items']); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>