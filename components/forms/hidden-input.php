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

$identifier = !empty($identifier) ? 'id="' . $identifier . '"' : '';
$name       = !empty($name)       ? 'name="' . $name . '"'     : '';
$value      = !empty($value)      ? 'value="' . $value . '"'   : '';
?>

<input type="hidden" <?php echo $identifier; ?> <?php echo $name; ?> <?php echo $value; ?>>