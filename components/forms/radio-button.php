<?php
/**
 * Radio button
 *
 * Renders a radio buttons. The input is hidden and replaced
 * with a stylable DIV.
 *
 * Automatically uses $title to set $name and $identifier
 * if $name or $identifier are not set.
 *
 * Has a param for validation prepared, but is noot hooked
 * up to any validation engine. Still wainting on finishing
 * Bolts Validate (prototyped in CIKO).
 *
 * @param string $title
 * @param string $name
 * @param string $value
 * @param string $identifier
 * @param bool   $is_checked
 * @param bool   $is_disabled
 * @param bool   $is_required
 * @param string $validate
 *
 * @param string $theme
 * @param string $modifier
 */

$disabled   = !empty($is_disabled) ? ' disabled' : '';
$required   = !empty($is_required) ? ' required' : '';
$identifier = !empty($identifier) ? $identifier : $title;
$name       = !empty($name) ? $name : $title;
$value      = !empty($value) ? $value : null;
$checked    = !empty($is_checked) ? ' checked' : '';
$validate   = !empty($validate) ? 'data-bolts-validate="' . $validate . '"' : '';

$theme       = !empty($theme) ? $theme : 'default';
$theme_class = 'is-theme-' . $theme;
$modifier    = !empty($modifier) ? $modifier : '';
?>

<label class="radio-button <?php echo $theme_class; ?> <?php echo $modifier; ?>" for="<?php echo $identifier; ?>">
    <input
        id="<?php echo $identifier; ?>"
        class="radio-button-input"
        type="radio"
        name="<?php echo $name; ?>"
        value="<?php echo isset($value) ? $value : ''; ?>"
        <?php echo $disabled; ?>
        <?php echo $checked; ?>
        <?php echo $required; ?>
    />
    <div class="radio-button-faux-input"></div>
    <span class="radio-button-label"><?php echo $title; ?></span>
</label>