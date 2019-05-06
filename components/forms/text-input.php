<?php
/**
 * Input
 *
 * Renders a text input with an optional label and description.
 *
 * Label and field id/for-connection is made automatically.
 *
 * Has validation markup prepared, but still waiting for Bolts Validation
 * to be completed (currently prototyped in CIKO).
 *
 * @param string $title
 * @param string $description
 * @param string $type - "text", "email", "url", "password", "tel", "search"
 * @param string $name
 * @param string $identifier
 * @param string $value
 * @param string $placeholder
 * @param string $validate     - validation type
 * @param string $error_text   - displays when validation fails
 * @param bool   $is_disabled
 * @param bool   $is_required
 *
 * TODO: @param string $icon
 * TODO: @param array  $button
 *
 * @param string $theme
 * @param string $modifier
 */

$attributes = attributes($attributes ?? '');
$modifier   = modifier($theme ?? null, $modifier ?? null);

$name        = !empty($name) ? $name : $title;
$value       = !empty($value) ? $value : '';
$placeholder = !empty($placeholder) ? $placeholder : '';
$disabled    = !empty($is_disabled) ? ' disabled' : '';
$is_required = !empty($is_required) ? $is_required : false;
$description = !empty($description) ? $description : '';
$required    = !empty($is_required) ? ' required' : '';
$identifier  = !empty($identifier) ? $identifier : $title;
$modifier    = !empty($modifier) ? $modifier : '';
$validate    = !empty($validate) ? 'data-bolts-validate="' . $validate . '"' : '';
$error_text  = !empty($error_text) ? $error_text : false;

$allowed_types = ['text', 'email', 'url', 'password', 'tel', 'search'];
$type          = !empty($type) ? $type : 'text';
$type          = in_array($type, $allowed_types) ? $type : 'text';

?>

<div class="text-input <?php echo $modifier; ?>" <?php echo $attributes; ?>>
    <div class="text-input-field-info">
        <?php component('forms/field-info', [
            'title'       => $title,
            'description' => $description,
            'identifier'  => $identifier,
            'is_required' => $is_required,
            'error_text'  => $error_text
        ]); ?>
    </div>

    <div class="text-input-inner">
        <input
            id="<?php echo $identifier; ?>"
            name="<?php echo $name; ?>"
            class="text-input-input"
            type="<?php echo $type; ?>"
            value="<?php echo $value; ?>"
            placeholder="<?php echo $placeholder; ?>"
            <?php echo $disabled; ?>
            <?php echo $required; ?>
            <?php echo $validate; ?>
        />
        <div class="text-input-faux-input"></div>
    </div>
</div>
