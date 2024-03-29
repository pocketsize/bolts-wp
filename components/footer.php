<?php
/**
 * Footer
 *
 * The main footer of the website
 *
 * @param string $theme
 * @param string $modifier
 * @param string $attributes
 *
 * @param string $content
 */

$attributes = attributes($attributes ?? '');
$modifiers  = modifiers($modifiers ?? null, $theme ?? null);
?>

<footer class="footer <?php echo $modifiers; ?>" <?php echo $attributes; ?>>
    <div class="footer-inner">
        <?php if (!empty($content)) { ?>
            <p><?php echo $content; ?></p>
        <?php } ?>
    </div>
</footer>
