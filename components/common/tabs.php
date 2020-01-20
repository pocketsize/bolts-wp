<?php
/**
 * Tabs
 *
 * @param string $attributes
 * @param string $theme
 * @param string $modifiers
 *
 * @param array  $tabs
 * @param string $tabs[i][label] - label on toggle button
 * @param array  $tabs[i][items]
 */

$attributes = get_attributes($attributes ?? '');
$attributes['data-bolts-selector'] = 'tabs';
$modifiers  = modifiers($modifiers ?? null, $theme ?? null);
?>

<?php if (!empty($tabs)) : ?>
    <div class="tabs <?php echo $modifiers; ?>" <?php echo attributes($attributes); ?>>
        <div class="tabs-inner">
            <div class="tabs-toggles">
                <?php foreach ($tabs as $i => $tab) : ?>
                    <?php $toggle_label = !empty($tab['label']) ? $tab['label'] : false; ?>
                    <div class="tabs-toggle">
                        <?php component('forms/button', [
                            'theme'      => 'tabs-toggle',
                            'content'    => $toggle_label,
                            'attributes' => [
                                'data-bolts-scope'            => 'tabs',
                                'data-bolts-selector'         => 'button',
                                'data-bolts-action'           => 'set',
                                'data-bolts-name'             => 'active',
                                'data-bolts-target'           => 'tab',
                                'data-bolts-parameter-unique' => true,
                                'data-bolts-parameter-index'  => true,
                                'data-bolts-parameter-self'   => true,
                                'data-bolts-state-active'     => $i == 0
                            ]
                        ]); ?>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="tabs-tabs">
                <?php foreach ($tabs as $i => $tab) : ?>
                    <?php $tab_attributes = get_attributes($tab['attributes'] ?? null, [
                        'data-bolts-state-active' => $i == 0,
                        'data-bolts-selector'     => 'tab'
                    ]); ?>
                    <div class="tabs-tab" <?php echo attributes($tab_attributes); ?>>
                        <?php if (!empty($tab['items'])) : ?>
                            <div class="tabs-items">
                                <?php layout_items($tab['items'], 'tabs-item'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>