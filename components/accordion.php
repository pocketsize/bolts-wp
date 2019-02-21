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

$theme       = !empty($theme) ? $theme : 'default';
$theme_class = 'is-theme-' . $theme;
$modifier    = !empty($modifier) ? $modifier : '';
?>

<ul class="accordion <?php echo $theme_class; ?> <?php echo $modifier; ?>" data-accordion>
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