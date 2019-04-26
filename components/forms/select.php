<?php
/**
 * Select
 *
 * Using Choices.js to render a pretty select.
 * Remember to include 'external/_choices.scss'
 * and init 'external/choices.js'.
 *
 * @param string $title
 * @param string $description
 * @param string $name
 * @param string $identifier
 * @param string $value
 * @param string $placeholder
 * @param string $error_text
 * @param bool   $is_required
 * @param string $validate
 *
 * @param array  $options
 * @param string $options.title
 * @param string $options.value
 * @param bool   $options.is_disabled
 * @param bool   $options.is_selected
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
$validate    = !empty($validate) ? 'data-bolts-validate="' . $validate . '"' : '';
$error_text  = !empty($error_text) ? $error_text : false;
?>

<?php if (!empty($options)) : ?>
    <div class="select <?php echo $modifier; ?>" <?php echo $attributes; ?>>
        <?php component('forms/field-info', [
            'title'       => $title,
            'description' => $description,
            'identifier'  => $identifier,
            'is_required' => $is_required,
            'error_text'  => $error_text
        ]); ?>

        <select name="<?php echo $name; ?>" class="select-select" data-bolts-choices="select">
            <?php foreach ($options as $option) : ?>
                <?php
                    $is_disabled = !empty($option['is_disabled']) ? 'disabled' : '';
                    $is_selected = !empty($option['is_selected']) ? 'selected' : '';
                ?>
                <option
                    value="<?php echo $option['value']; ?>"
                    <?php echo $is_selected; ?>
                    <?php echo $is_disabled; ?>>
                    <?php echo $option['title']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
<?php endif; ?>