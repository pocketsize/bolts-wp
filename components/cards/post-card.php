<?php
/**
 * Post card
 *
 * @param string $theme
 * @param string $modifier
 * @param string $attributes
 *
 * @param string $image
 * @param string $date
 * @param string $title
 * @param string $excerpt
 * @param string $link
 */

$attributes = attributes($attributes ?? '');
$modifiers  = modifiers($modifiers ?? null, $theme ?? null);
?>

<article class="post-card <?php echo $modifiers; ?>" <?php echo $attributes; ?>>
    <?php if (!empty($image)) : ?>
        <div class="post-card-image">
            <?php component('common/image', $image); ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($title)) : ?>
        <div class="post-card-title">
            <?php component('common/content', [
                'meta'    => $date,
                'title'   => $title,
                'content' => $excerpt
            ]); ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($link)) : ?>
        <div class="post-card-link">
            <?php component('common/link', $link); ?>
        </div>
    <?php endif; ?>
</article>