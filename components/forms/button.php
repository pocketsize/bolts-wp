<?php
/**
 * Button
 *
 * @param string $content
 * @param string $attributes
 *
 * @param string $theme
 * @param string $modifier
 */

$attributes = attributes($attributes ?? '');
$modifiers  = modifiers($modifiers ?? null, $theme ?? null);
?>

<button class="button <?php echo $modifiers; ?>" <?php echo $attributes; ?>>
    <?php if (!empty($content)) : ?>
        <div class="button-inner"><?php echo $content; ?></div>
    <?php endif; ?>
</button>