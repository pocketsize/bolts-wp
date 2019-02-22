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
$modifier    = !empty($modifier) ? $modifier : '';
$validate    = !empty($validate) ? 'data-bolts-validate="' . $validate . '"' : '';
$error_text  = !empty($error_text) ? $error_text : false;

$theme       = !empty($theme) ? $theme : 'default';
$theme_class = 'is-theme-' . $theme;
$modifier    = !empty($modifier) ? $modifier : '';
?>

<div class="textarea <?php echo $theme_class; ?> <?php echo $modifier; ?>" data-bolts-input-wrapper>
    <div class="textarea-inner">
        <?php component('forms/field-info', [
            'title'       => $title,
            'description' => $description,
            'identifier'  => $identifier,
            'is_required' => $is_required,
            'error_text'  => $error_text
        ]); ?>

        <div class="textarea-faux-input-outer">
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
</div>
