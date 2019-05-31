<?php
/**
 * Form
 *
 * @param string $theme
 * @param string $modifiers
 * @param string|array $attributes
 *
 * @param string $action
 *
 * @param array  $fields
 */

$action = !empty($action) ? $action : true;

$attributes = attributes($attributes ?? '', [
    'method' => 'post',
    'action' => $action
]);

$modifiers = modifiers($modifiers ?? null, $theme ?? null);

?>
<form class="form <?php echo $modifiers; ?>" <?php echo $attributes; ?>>
    <div class="form-fields">
        <?php layout_items($fields, 'form-field'); ?>
    </div>
</form>