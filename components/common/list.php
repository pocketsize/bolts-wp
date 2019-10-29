<?php
/**
 * List
 * 
 * @param string $theme
 * @param string $modifiers
 * @param string $attributes
 * 
 * @param null|bool $ordered
 * @param array $items
 */

if (empty($items)) {
    return false;
}

$attributes = attributes($attributes ?? '');
$modifiers  = get_modifiers($modifiers ?? null, $theme ?? null);

$ordered  = isset($ordered) ? $ordered : false;
$list_tag = $ordered ? 'ol' : 'ul';

if (in_array('is-theme-default', $modifiers)) {
    $modifiers[] = 'is-' . ($ordered ? 'ordered' : 'unordered');
}
?>
<<?php echo $list_tag; ?> class="list <?php echo modifiers($modifiers, false); ?>" <?php echo $attributes; ?>>
    <?php layout_items($items, 'list-item', 'li'); ?>
</<?php echo $list_tag; ?>>