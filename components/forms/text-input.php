<?php
/**
 * Text input
 *
 * Field info label for attribute is automatically set to text input id attribute
 *
 * @param string $theme
 * @param string $modifier
 * @param string|array $attributes
 *
 * @param string $title
 * @param string $description
 * @param string $error_text
 */

$attributes         = get_attributes($attributes ?? []);
$allowed_types      = ['text', 'email', 'url', 'password', 'tel', 'search'];
$attributes['type'] = !empty($attributes['type']) && in_array($attributes['type'], $allowed_types) ? $attributes['type'] : 'text';

$modifiers          = modifiers($modifiers ?? null, $theme ?? null);

$title              = !empty($title)       ? $title       : false;
$description        = !empty($description) ? $description : false;
$error_text         = !empty($error_text)  ? $error_text  : false;

$id                 = !empty($attributes['id'])       ? $attributes['id']       : false;
$required           = !empty($attributes['required']) ? $attributes['required'] : false;
?>

<div class="text-input <?php echo $modifier; ?>">
    <?php if (!empty($title) || !empty($description) || !empty($error_text)) : ?>
        <div class="text-input-field-info">
            <?php component('forms/field-info', [
                'title'       => $title,
                'description' => $description,
                'identifier'  => $id,
                'is_required' => $required,
                'error_text'  => $error_text
            ]); ?>
        </div>
    <?php endif; ?>

    <div class="text-input-inner">
        <input class="text-input-input" <?php echo attributes($attributes); ?> />

        <div class="text-input-faux-input"></div>
    </div>
</div>