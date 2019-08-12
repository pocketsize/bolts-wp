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

$action = !empty($action) ? $action : admin_url('admin-post.php');

$attributes = attributes($attributes ?? '', [
    'method' => 'post',
    'action' => esc_url($action)
]);

$modifiers = modifiers($modifiers ?? null, $theme ?? null);

?>
<form class="form <?php echo $modifiers; ?>" <?php echo $attributes; ?>>
    <div class="form-fields">
        <?php layout_items($fields, 'form-field'); ?>
    </div>
</form>