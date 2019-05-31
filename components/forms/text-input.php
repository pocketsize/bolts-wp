<?php
/**
 * Text input
 *
 * @param string $theme
 * @param string|array $modifier
 * @param string|array $attributes
 *
 * @param string $title
 * @param string $description
 * @param string $error_text
 *
 * @param array $input
 *
 */

$modifiers  = modifiers($modifiers ?? null, $theme ?? null);
$attributes = attributes($attributes ?? null);

$input                       = !empty($input) ? $input : [];
$input['attributes']         = get_attributes($input['attributes'] ?? []);
$allowed_types               = ['text', 'email', 'url', 'password', 'tel', 'search'];
$input['attributes']['type'] = !empty($input['attributes']['type']) && in_array($input['attributes']['type'], $allowed_types) ? $input['attributes']['type'] : 'text';

$title       = !empty($title)       ? $title       : false;
$description = !empty($description) ? $description : false;
$error_text  = !empty($error_text)  ? $error_text  : false;

$input['attributes']['id'] = !empty($input['attributes']['id']) ? $input['attributes']['id'] : 'input-' . uniqid();
$required                  = !empty($input['attributes']['required']) ? $input['attributes']['required'] : false;

?>
<div class="text-input <?php echo $modifiers; ?>" <?php echo $attributes; ?>>
    <?php if (!empty($title) || !empty($description) || !empty($error_text)) : ?>
        <div class="text-input-field-info">
            <?php component('forms/field-info', [
                'title'       => $title,
                'description' => $description,
                'id'          => $input['attributes']['id'],
                'required'    => $required,
                'error_text'  => $error_text
            ]); ?>
        </div>
    <?php endif; ?>

    <div class="text-input-inner">
        <input class="text-input-input" <?php echo attributes($input['attributes']); ?> />

        <div class="text-input-faux-input"></div>
    </div>
</div>