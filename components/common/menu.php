<?php
/**
 * Menu
 *
 * @param string $theme
 * @param string $modifiers
 * @param string $attributes
 *
 * @param string $items
 *
 */
if (empty($items)) return false;

?>
<nav class="menu <?php echo modifiers($modifiers ?? null); ?>" <?php echo attributes($attributes ?? null); ?>>
    <ul class="menu-items">
        <?php foreach ($items as $item) { ?>
            <li class="menu-item <?php modifiers($item['modifiers'] ?? null, false); ?>" <?php echo attributes($item['attributes'] ?? ['data-bolts-selector' => 'menu-item']); ?>>
                <?php layout_items($item['items']); ?>
            </li>
        <?php } ?>
    </ul>
</nav>