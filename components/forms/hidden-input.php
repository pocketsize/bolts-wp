<?php
/**
 * Hidden Input
 *
 * Simply creates a hidden input.
 *
 * @param string $attributes
 */

$attributes = attributes($attributes ?? null, ['type' => 'hidden'])

?>
<input <?php echo $attributes; ?>>