<?php
/**
 * Slider
 *
 * @param string $attributes
 * @param string $theme
 * @param string $modifiers
 *
 * @param array $items
 * @param bool $arrows
 * @param bool $dots
 */

$attributes = get_attributes($attributes ?? '');
$attributes['data-bolts-selector'] = 'slider';
$modifiers  = modifiers($modifiers ?? null, $theme ?? null);

?>
<?php if (!empty($items)) : ?>
    <section class="slider <?php echo $modifiers; ?>" <?php echo attributes($attributes); ?>>
        <div class="slider-items" data-bolts-selector="items">
            <?php foreach ($items as $item) : ?>
                <div class="slider-item" data-bolts-selector="item">
                    <?php layout_items($item); ?>
                </div>
            <?php endforeach; ?>
        </div>

        <?php if (!empty($arrows) && count($items) > 1) : ?>
            <div class="slider-arrow is-previous">
                <?php component('forms/button', [
                    'theme' => 'slider-arrow',
                    'attributes' => [
                        'data-bolts-action' => 'go-to',
                        'data-bolts-value' => 'previous'
                    ],
                    'content' => 'Previous'
                ]); ?>
            </div>

            <div class="slider-arrow is-next">
                <?php component('forms/button', [
                    'theme' => 'slider-arrow',
                    'attributes' => [
                        'data-bolts-action' => 'go-to',
                        'data-bolts-value' => 'next'
                    ],
                    'content' => 'Next'
                ]); ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($dots) && count($items) > 1) : ?>
            <nav class="slider-dots">
                <?php foreach ($items as $i => $item) : ?>
                     <?php component('forms/button', [
                        'theme' => 'slider-dot',
                        'attributes' => [
                            'data-bolts-selector' => 'dot',
                            'data-bolts-action' => 'go-to',
                            'data-bolts-value' => $i,
                            'data-bolts-state-active' => $i == 0
                        ],
                        'content' => $i + 1
                    ]); ?>
                <?php endforeach; ?>
            </nav>
        <?php endif; ?>
    </section>
<?php endif; ?>