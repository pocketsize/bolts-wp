<?php
/**
 * Wysiwyg
 *
 * @param string $theme (default, lead)
 * @param string $modifiers
 * @param string $attributes
 *
 * @param string $content
 *
 */

$modifiers  = modifiers($modifiers ?? null, $theme ?? null);
$attributes = get_attributes($attributes ?? '');

if (empty($content)) {
    return false;
}

?>
<div class="wysiwyg <?php echo $modifiers; ?>" <?php echo attributes($attributes); ?>>
    <?php echo $content; ?>
</div>