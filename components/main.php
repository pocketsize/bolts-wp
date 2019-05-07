<?php
/**
 * Footer
 *
 * The main footer of the website
 * 
 * @param string $theme
 * @param string $modifier
 * @param string $attributes
 * 
 * @param string $sections
 */

$attributes = attributes($attributes ?? '');
$modifier   = modifier($theme ?? null, $modifier ?? null);
?>

<main class="main <?php echo $modifier; ?>" <?php echo $attributes; ?>>
	<?php layout_items($sections, 'main-section'); ?>
</main>
