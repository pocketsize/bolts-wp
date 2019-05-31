<?php
/**
 * Field info
 *
 * @param string $theme
 * @param string|array $modifier
 * @param string|array $attributes
 *
 * @param string $title
 * @param string $required
 * @param string $error_text
 * @param string $description
 *
 */

$modifiers  = modifiers($modifiers ?? null, $theme ?? null);
$attributes = get_attributes($attributes ?? null);

$id                = !empty($id) ? $id : false;
$attributes['for'] = !empty($attributes['for']) ? $attributes['for'] : $id;

?>
<label class="field-info <?php echo $modifiers; ?>" <?php echo attributes($attributes); ?>>
    <h5 class="field-info-label">
        <?php if (!empty($title)) : ?>
            <span class="field-info-label-inner"><?php echo $title; ?></span>
        <?php endif; ?>

        <?php if (!empty($required)) : ?>
            <abbr class="field-info-required-mark" title="required">*</abbr>
        <?php endif; ?>
    </h5>

    <?php if (!empty($error_text)) : ?>
        <p class="field-info-error-text"><?php echo $error_text; ?></p>
    <?php endif; ?>

    <?php if (!empty($description)) : ?>
        <p class="field-info-description"><?php echo $description; ?></p>
    <?php endif; ?>
</label>