<?php
/**
 * Title
 *
 * @param string $theme (primary, secondary)
 * @param string $modifiers
 * @param string $attributes
 *
 * @param string $content
 *
 */

$modifiers  = modifiers($modifiers ?? null, $theme ?? null);
$attributes = get_attributes($attributes ?? '');

$level = !empty($level) && (1 <= $level) && ($level <= 6) ? $level : 2;

?>
<h<?php echo $level; ?> class="title <?php echo $modifiers; ?>" <?php echo attributes($attributes); ?>><?php echo $content; ?></h<?php echo $level; ?>>