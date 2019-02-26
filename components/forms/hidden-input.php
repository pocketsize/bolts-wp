<?php
/**
 * Hidden Input
 *
 * Simply creates a hidden input.
 *
 * @param string $identifier
 * @param string $name
 * @param string $value
 */

// Nullchecks
$identifier = !empty($identifier) ? 'id="' . $identifier . '"' : '';
$name       = !empty($name) ? 'id="' . $name . '"' : '';
$value      = !empty($value) ? 'id="' . $value . '"' : '';
?>

<input type="hidden" <?php echo $identifier; ?> <?php echo $name; ?> <?php echo $value; ?>