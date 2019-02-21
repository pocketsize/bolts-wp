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
 */

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

$theme       = !empty($theme) ? $theme : 'default';
$theme_class = 'is-theme-' . $theme;
$modifier    = !empty($modifier) ? $modifier : '';
?>

<div class="text-input <?php echo $theme_class; ?> <?php echo $modifier; ?>" data-bolts-input-wrapper>
    <div class="text-input-inner">
        <?php component('forms/field-info', [
            'title'       => $title,
            'description' => $description,
            'identifier'  => $identifier,
            'is_required' => $is_required,
            'error_text'  => $error_text
        ]); ?>

        <div class="text-input-faux-input-outer">
            <?php // TODO: icon slot here ?>

            <input
                id="<?php echo $identifier; ?>"
                name="<?php echo $name; ?>"
                class="text-input-input"
                type="text"
                value="<?php echo $value; ?>"
                placeholder="<?php echo $placeholder; ?>"
                <?php echo $disabled; ?>
                <?php echo $required; ?>
                <?php echo $validate; ?>
            />
            <div class="text-input-faux-input"></div>
            <?php // TODO: button slot here ?>
        </div>
    </div>
</div>
