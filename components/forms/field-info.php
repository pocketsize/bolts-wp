<?php
/**
 * Field info
 *
 * Displays label and description for all form fields.
 *
 * Also features an error text in preparation for the
 * completion of Bolts Validate (prototyped in CIKO).
 *
 * @param string $title
 * @param string $description
 * @param string $identifier
 * @param bool   $is_required;
 * @param string $error_text
 */

$identifier = !empty($identifier) ? $identifier : $title;
?>

<?php if (!empty($title) || !empty($description) || !empty($error_text)) : ?>
    <header class="field-info">
        <div class="field-info-label-wrapper">
            <?php if (!empty($title)) : ?>
                <label class="field-info-label" for="<?php echo !empty($for) ? $for : ''; ?>">
                    <?php echo $title; ?>

                    <?php if (!empty($is_required)) : ?>
                        <abbr class="field-info-required-mark" title="required">*</abbr>
                    <?php endif; ?>

                    <?php if (!empty($error_text)) : ?>
                        <abbr class="field-info-validation-message" data-auto-height><?php echo $error_text; ?></abbr>
                    <?php endif; ?>
                </label>
            <?php endif; ?>

            <?php if (!empty($help_text)) : ?>
                <p class="field-info-help-text"><?php echo $help_text; ?></p>
            <?php endif; ?>

            <?php // TODO: Tooltip goes here... ?>
        </div>

        <?php if (!empty($description)) : ?>
            <p class="field-info-description"><?php echo $description; ?></p>
        <?php endif; ?>
    </header>
<?php endif; ?>