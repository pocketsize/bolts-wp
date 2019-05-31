<?php
/**
 * Checkbox
 *
 * @param string $theme
 * @param string|array $modifier
 * @param string|array $attributes
 *
 * @param string $title
 * @param array $input
 *
 */

$modifiers  = modifiers($modifiers ?? null, $theme ?? null);
$attributes = get_attributes($attributes ?? null);

$input                       = !empty($input) ? $input : [];
$input['attributes']         = get_attributes($input['attributes'] ?? []);
$input['attributes']['type'] = !empty($input['attributes']['type']) ? $input['attributes']['type'] : 'checkbox';

$title = !empty($title) ? $title : '';

$id       = !empty($input['attributes']['id'])       ? $input['attributes']['id']       : false;
$required = !empty($input['attributes']['required']) ? $input['attributes']['required'] : false;

?>
<label class="checkbox <?php echo $modifiers; ?>" <?php echo attributes($attributes); ?>>
    <input class="checkbox-input" <?php echo attributes($input['attributes']); ?> />
    <div class="checkbox-faux-input"></div>
    <span class="checkbox-label"><?php echo $title; ?></span>
</label>