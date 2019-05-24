<?php
/**
 * Button
 *
 * @param string $title
 * @param string $attributes
 *
 * @param string $theme
 * @param string $modifier
 */

$attributes = attributes($attributes ?? '');
$modifiers  = modifiers($modifiers ?? null, $theme ?? null);
?>

<button class="button <?php echo $modifier; ?>" <?php echo $attributes; ?>>
	<?php if (!empty($title)) : ?>
        <div class="button-inner"><?php echo $title; ?></div>
	<?php endif; ?>
</button>