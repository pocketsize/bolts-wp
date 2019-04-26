<?php
/**
 * Tabs
 *
 * Wraps components and lets you tab between them
 *
 * @param string $theme
 * @param string $modifier
 *
 * @param array  $tabs
 * @param string $tabs[i].label - label on toggle button
 * @param array  $tabs[i].items
 */

$modifier = modifier($theme ?? null, $modifier ?? null);
?>

<?php if (!empty($tabs)) : ?>
    <div class="tabs <?php echo $modifier; ?>" data-bolts-target="tabs">
        <div class="tabs-inner">
            <div class="tabs-toggles">
                <?php foreach ($tabs as $i => $tab) : ?>
                    <?php $toggle_label = !empty($tab['label']) ? $tab['label'] : false; ?>
                    <div class="tabs-toggle">
                        <?php component('common/button', [
                            'title'      => $toggle_label,
                            'attributes' => [
                                'data-bolts-target'       => 'tab',
                                'data-bolts-tab-to'       => $i,
                                'data-bolts-state-active' => $i == 0,
                                'data-bolts-tab-slug'     => !empty($tab['slug']) ? $tab['slug'] : false
                            ]
                        ]); ?>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="tabs-items">
                <?php foreach ($tabs as $i => $tab) : ?>
                    <?php $item_state = $i == 0 ? 'data-bolts-state-active' : ''; ?>

                    <div class="tabs-item" data-bolts-tab-index="<?php echo $i; ?>" data-bolts-target="tab-content" <?php echo $item_state; ?>>
                        <div class="tabs-item-inner">
                            <?php layout_items($tab['items']); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>