<?php
/**
 * Fieldset
 *
 * TODO: $form_id variable support (allows fieldset to be part of a form, even if it is not nested inside it)
 * TODO: Use legend element inside fieldset for $title?
 *
 * @param string $theme
 * @param string|array $modifiers
 * @param string|array $attribuets
 *
 * @param string $title
 * @param string $description
 * @param string $error_text
 *
 * @param array  $items
 *
 */

$attributes = attributes($attributes ?? '');
$modifiers  = modifiers($modifiers ?? null, $theme ?? null);

$fieldset               = !empty($fieldset) ? $fieldset : [];
$fieldset['attributes'] = get_attributes($fieldset['attributes'] ?? []);

$title       = !empty($title)       ? $title       : false;
$description = !empty($description) ? $description : false;
$error_text  = !empty($error_text)  ? $error_text  : false;

$id       = !empty($fieldset['attributes']['id'])       ? $fieldset['attributes']['id']       : false;
$required = !empty($fieldset['attributes']['required']) ? $fieldset['attributes']['required'] : false;

$items = !empty($items) ? $items : [];
$name  = !empty($name)  ? $name  : false;

foreach ($items as &$item) {
    $item['input']['attributes']['name'] = !empty($item['input']['attributes']['name']) ? $item['input']['attributes']['name'] : $name;
}

?>
<div class="fieldset <?php echo $modifiers; ?>" <?php echo $attributes; ?>>
    <div class="fieldset-field-info">
        <?php component('forms/field-info', [
            'title'       => $title,
            'description' => $description,
            'id'          => $id,
            'required'    => $required,
            'error_text'  => $error_text
        ]); ?>
    </div>

    <fieldset class="fieldset-items" <?php echo attributes($fieldset['attributes']); ?>>
        <?php layout_items($items, 'fieldset-item'); ?>
    </fieldset>
</div>
