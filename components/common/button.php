<?php
/**
 * Button
 *
 * @param string $title
 * @param string $target
 * @param string $url
 * @param string $identifier
 *
 * @param string $theme
 * @param string $modifier
 */

$target     = !empty($target) ? $target : '';
$rel        = $target == '_blank' ? 'rel="noopener noreferrer"' : '';
$identifier = !empty($identifier) ? 'data-click="' . $identifier . '"' : '';

$theme       = !empty($theme) ? $theme : 'default';
$theme_class = 'is-theme-' . $theme;
$modifier    = !empty($modifier) ? $modifier : '';
?>

<?php if (!empty($title)) : ?>
    <div class="button <?php echo $theme_class; ?> <?php echo $modifier; ?>" <?php echo $identifier; ?>>
        <button class="button-inner"><?php echo $title; ?></button>

        <?php if (!empty($url)) : ?>
            <a class="button-link" href="<?php echo $url; ?>" target="<?php echo $target; ?>" <?php echo $rel; ?>></a>
        <?php endif; ?>
    </div>
<?php endif; ?>