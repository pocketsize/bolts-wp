<?php
/**
 * Accordion
 *
 * @param string $theme
 * @param string $modifiers
 * @param string $attributes
 *
 * @param array  $items
 * @param string $items[i][title]
 * @param string $items[i][content]
 */

$attributes = get_attributes($attributes ?? '');
$attributes['data-bolts-selector'] = 'accordion';
$modifiers  = modifiers($modifiers ?? null, $theme ?? null);

?>
<div class="accordion <?php echo $modifiers; ?>" <?php echo attributes($attributes); ?>>
    <ul class="accordion-items">
        <?php foreach ($items as $item) : ?>
            <li class="accordion-item" data-bolts-selector="item">
                <div class="accordion-button">
                    <?php component('forms/button', [
                        'theme' => 'accordion-label',
                        'attributes' => [
                            'data-bolts-scope'             => 'accordion',
                            'data-bolts-action'            => 'toggle',
                            'data-bolts-target'            => 'item',
                            'data-bolts-name'              => 'active',
                            'data-bolts-parameter-closest' => true
                        ],
                        'content' => $item['title']
                    ]); ?>
                </div>

                <div class="accordion-content" data-bolts-action="auto-height">
                    <div class="accordion-content-inner">
                        <?php component('common/wysiwyg', [
                            'content' => $item['content']
                        ]); ?>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>