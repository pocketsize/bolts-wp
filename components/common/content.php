<?php
/**
 * Content
 *
 * Basic styling and layout of text content.
 * Please use this as widely as possible. It's awesome.
 *
 * @param string $title
 * @param string $content
 * @param string $title_tag - "h1", "h2"
 *
 * @param string $theme
 * @param string $modifier
 */

$title_tag = !empty($title_tag) ? $title_tag : 'h2';

$theme       = !empty($theme) ? $theme : 'default';
$theme_class = 'is-theme-' . $theme;
$modifier    = !empty($modifier) ? $modifier : '';
?>

<div class="content <?php echo $theme_class; ?> <?php echo $modifier; ?>">
    <?php if (!empty($title)) : ?>
        <<?php echo $title_tag; ?> class="content-title">
            <?php echo $title; ?>
        </<?php echo $title_tag; ?>>
    <?php endif; ?>

    <?php if (!empty($content)) : ?>
        <div class="content-content"><?php echo $content; ?></div>
    <?php endif; ?>
</div>