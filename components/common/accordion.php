<?php
/**
 * Accordion
 *
 * Make sure to include the JS file as well!
 *
 * @param array  $items
 * @param string $items.title
 * @param string $items.content
 *
 * @param string $theme
 * @param string $modifier
 */

$attributes = attributes($attributes ?? '');
$modifiers  = modifiers($modifiers ?? null, $theme ?? null);
?>

<ul class="accordion <?php echo $modifiers; ?>" <?php echo $attributes; ?> data-accordion>
    <?php foreach ($items as $item) : ?>
        <li class="accordion-item" data-accordion-item>
            <div class="accordion-tab" data-accordion-toggle>
                <h3 class="accordion-title"><?php echo $item['title']; ?></h3>
            </div>

            <div class="accordion-content" data-auto-height>
                <div class="accordion-content-inner">
                    <?php echo $item['content']; ?>
                </div>
            </div>
        </li>
    <?php endforeach; ?>
</ul>