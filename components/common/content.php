<?php
/**
 * Content
 *
 * Basic styling and layout of text content.
 * Please use this as widely as possible. It's awesome.
 *
 * @param string $modifier
 * @param string $title
 * @param string $title_tag - "h1", "h2"
 * @param string $content
 * @param string $theme
 */

$attributes = attributes($attributes ?? '');
$modifier   = modifier($theme ?? null, $modifier ?? null);
$title_tag  = !empty($title_tag) ? $title_tag : 'h2';
?>

<div class="content <?php echo $modifier; ?>" <?php echo $attributes; ?>>
    <?php if (!empty($title)) : ?>
        <<?php echo $title_tag; ?> class="content-title">
            <?php echo $title; ?>
        </<?php echo $title_tag; ?>>
    <?php endif; ?>

    <?php if (!empty($lead)) : ?>
        <div class="content-lead">
            <?php echo $lead; ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($content)) : ?>
        <div class="content-content">
            <?php echo $content; ?>
        </div>
    <?php endif; ?>
</div>