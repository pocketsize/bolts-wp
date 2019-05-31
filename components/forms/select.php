<?php
/**
 * Select
 *
 * @param string $theme
 * @param string|array $modifier
 * @param string|array $attributes
 *
 * @param string $title
 * @param string $description
 * @param string $error_text
 *
 * @param array  $options
 *
 */

$attributes = attributes($attributes ?? '');
$modifiers  = modifiers($modifiers ?? null, $theme ?? null);

$select               = !empty($select) ? $select : [];
$select['attributes'] = get_attributes($select['attributes'] ?? []);

$title       = !empty($title)       ? $title       : false;
$description = !empty($description) ? $description : false;
$error_text  = !empty($error_text)  ? $error_text  : false;

$id       = !empty($input['attributes']['id'])       ? $input['attributes']['id']       : false;
$required = !empty($input['attributes']['required']) ? $input['attributes']['required'] : false;

?>
<div class="select <?php echo $modifiers; ?>" <?php echo $attributes; ?>>
    <?php if (!empty($title) || !empty($description) || !empty($error_text)) : ?>
        <div class="select-field-info">
            <?php component('forms/field-info', [
                'title'       => $title,
                'description' => $description,
                'id'          => $id,
                'required'    => $required,
                'error_text'  => $error_text
            ]); ?>
        </div>
    <?php endif; ?>

    <div class="select-inner">
        <select class="select-select" <?php echo attributes($select['attributes']); ?>>
            <?php layout_items($options, 'select-option', 'option'); ?>
        </select>
    </div>
</div>