<?php
/**
 * Textarea
 *
 * @param string $title
 * @param string $description
 * @param string $name
 * @param string $identifier
 * @param string $value
 * @param string $placeholder
 * @param int    $rows         - defaults to 4
 * @param string $maxlength
 * @param string $validate     - validation type
 * @param string $error_text   - displays when validation fails
 * @param bool   $is_disabled
 * @param bool   $is_required
 *
 * @param string $theme
 * @param string $modifier
 */

$attributes = attributes($attributes ?? '');
$modifiers   = modifiers($modifiers ?? null, $theme ?? null);

$name        = !empty($name) ? $name : $title;
$value       = !empty($value) ? $value : '';
$placeholder = !empty($placeholder) ? $placeholder : '';
$description = !empty($description) ? $description : '';
$rows        = !empty($rows) ? $rows : 4;
$maxlength   = !empty($maxlength) ? 'maxlength="' . $maxlength . '"' : '';
$disabled    = !empty($is_disabled) ? ' disabled' : '';
$is_required = !empty($is_required) ? $is_required : false;
$required    = !empty($is_required) ? ' required' : '';
$identifier  = !empty($identifier) ? $identifier : $title;
$modifiers   = !empty($modifiers) ? $modifiers : '';
$validate    = !empty($validate) ? 'data-bolts-validate="' . $validate . '"' : '';
$error_text  = !empty($error_text) ? $error_text : false;
?>

<div class="textarea <?php echo $modifiers; ?>" data-bolts-input-wrapper <?php echo $attributes; ?>>
    <div class="textarea-field-info">
        <?php component('forms/field-info', [
            'title'       => $title,
            'description' => $description,
            'identifier'  => $identifier,
            'is_required' => $is_required,
            'error_text'  => $error_text
        ]); ?>
    </div>

    <div class="textarea-inner">
        <textarea
            class="textarea-input"
            name="<?php echo $name; ?>"
            rows="<?php echo $rows; ?>"
            id="<?php echo $identifier; ?>"
            placeholder="<?php echo $placeholder; ?>"
            <?php echo $maxlength; ?>
            <?php echo $disabled; ?>
            <?php echo $required; ?>
            <?php echo $validate; ?>
        ><?php echo $value;  ?></textarea>

        <div class="textarea-faux-input"></div>
    </div>
</div>
