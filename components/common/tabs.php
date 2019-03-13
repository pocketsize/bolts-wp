<?php
/**
 * Tabs
 *
 * Wraps components and lets you tab between them
 *
 * @param array  $content
 * @param string $content[i].label - label on toggle button
 * @param string $content[i].component
 * @param string $content[i].data
 */
?>

<?php if (!empty($content)) : ?>
    <div class="tabs" data-bolts-tabs>
        <div class="tabs-inner">
            <div class="tabs-toggles">
                <?php foreach ($content as $i => $item) : ?>
                    <?php $active_class = $i === 0 ? 'is-active' : ''; ?>
                    <div class="tabs-toggle <?php echo $active_class; ?>" data-bolts-tab-to="component-<?php echo $i; ?>">
                        <?php component('common/button', ['title' => $item['label']]); ?>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="tabs-content-container" data-bolts-tab-container>
                <?php foreach ($content as $i => $item) : ?>
                    <?php $active_class = $i === 0 ? 'is-active' : ''; ?>
                    <div class="tabs-content <?php echo $active_class; ?>" data-bolts-tab-content="component-<?php echo $i; ?>">
                        <?php component($item['component'], $item['data']); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>