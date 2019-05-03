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
$modifier   = modifier($theme ?? null, $modifier ?? null);
?>

<button class="button <?php echo $modifier; ?>" <?php echo $attributes; ?>>
	<?php if (!empty($title)) : ?>
        <div class="button-inner"><?php echo $title; ?></div>
	<?php endif; ?>
</button>