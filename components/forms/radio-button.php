<?php
/**
 * Radio button
 *
 * @param string $theme
 * @param string|array $modifier
 * @param string|array $attributes
 *
 * @param string $content
 * @param array $input
 *
 */

$modifiers  = modifiers($modifiers ?? null, $theme ?? null);
$attributes = get_attributes($attributes ?? null);

$input                       = !empty($input) ? $input : [];
$input['attributes']         = get_attributes($input['attributes'] ?? []);
$input['attributes']['type'] = !empty($input['attributes']['type']) ? $input['attributes']['type'] : 'radio';

$content = !empty($content) ? $content : '';

$id       = !empty($input['attributes']['id'])       ? $input['attributes']['id']       : false;
$required = !empty($input['attributes']['required']) ? $input['attributes']['required'] : false;

?>
<label class="radio-button <?php echo $modifiers; ?>" <?php echo attributes($attributes); ?>>
    <input class="radio-button-input" <?php echo attributes($input['attributes']); ?> />
    <div class="radio-button-faux-input"></div>
    <span class="radio-button-label"><?php echo $content; ?></span>
</label>