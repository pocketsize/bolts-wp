<?php
/**
 * Textarea
 *
 * @param string $theme
 * @param string|array $modifiers
 * @param string|array $attributes
 *
 * @param string $title
 * @param string $description
 * @param string $error_text
 *
 * @param array $textarea
 * @param string $value
 *
 */

$attributes = attributes($attributes ?? '');
$modifiers  = modifiers($modifiers ?? null, $theme ?? null);

$textarea               = !empty($textarea) ? $textarea : [];
$textarea['attributes'] = get_attributes($textarea['attributes'] ?? []);

$title       = !empty($title)       ? $title       : '';
$description = !empty($description) ? $description : '';
$error_text  = !empty($error_text)  ? $error_text  : false;
$value       = !empty($value)       ? $value       : '';

$id       = !empty($textarea['attributes']['id'])       ? $textarea['attributes']['id']       : false;
$required = !empty($textarea['attributes']['required']) ? $textarea['attributes']['required'] : false;

?>
<div class="textarea <?php echo $modifiers; ?>" <?php echo $attributes; ?>>
    <?php if (!empty($title) || !empty($description) || !empty($error_text)) : ?>
        <div class="textarea-field-info">
            <?php component('forms/field-info', [
                'title'       => $title,
                'description' => $description,
                'id'          => $id,
                'required'    => $required,
                'error_text'  => $error_text
            ]); ?>
        </div>
    <?php endif; ?>

    <div class="textarea-inner">
        <textarea class="textarea-textarea" <?php echo attributes($textarea['attributes']); ?>><?php echo $value; ?></textarea>
    </div>
</div>
