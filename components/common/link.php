<?php
/**
 * Link
 *
 * @param string $title
 * @param string $target
 * @param string $url
 * @param string $custom_attrs
 *
 * @param string $theme
 * @param string $modifier
 */

$modifier   = modifier($theme ?? null, $modifier ?? null);
$attributes = attributes($attributes ?? '');

$target     = !empty($target) ? $target : '';
$rel        = $target == '_blank' ? 'rel="noopener noreferrer"' : '';
?>

<?php if (!empty($title) && !empty($url)) : ?>
    <a
        class="link <?php echo $modifier; ?>"
        href="<?php echo $url; ?>"
        target="<?php echo $target; ?>"
        <?php echo $rel; ?>
        <?php echo $attributes; ?>
    >
        <span class="link-inner"><?php echo $title; ?></span>
    </a>
<?php endif; ?>