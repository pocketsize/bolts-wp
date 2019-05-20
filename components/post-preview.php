<?php
/**
 * Post preview
 *
 * A preview of content, mostly post-type posts
 *
 * @param string $theme
 * @param string $modifier
 * @param string $attributes
 *
 * @param string $image
 * @param string $meta
 * @param string $title
 * @param string $excerpt
 * @param string $link
 */

$attributes = attributes($attributes ?? '');
$modifier   = modifier($theme ?? null, $modifier ?? null);

$image   = !empty($image)   ? $image : false;
$title   = !empty($title)   ? $title : false;
$excerpt = !empty($excerpt) ? $excerpt : false;
?>

<article class="post-preview <?php echo $modifier; ?>">
    <div class="post-preview-image">
        <?php component('common/image', $image); ?>
    </div>

    <div class="post-preview-content">
        <div class="post-preview-content">

            <?php component('common/content', [
                'meta'    => $meta,
                'title'   => $title,
                'content' => $excerpt
            ]); ?>
        </div>

        <div class="post-preview-link">
            <?php component('common/link', $link); ?>
        </div>
    </div>
</article>