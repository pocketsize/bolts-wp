<?php
/**
 * Post preview
 *
 * A preview of content, mostly post-type posts
 *
 * @param string $image
 * @param string $title
 * @param string $content
 * @param string $link_url
 *
 * @param string $theme
 * @param string $modifier
 */

$attributes = attributes($attributes ?? '');
$modifier   = modifier($theme ?? null, $modifier ?? null);

$image = !empty($image) ? $image : false;
?>

<?php if (!empty($title) && !empty($content)) : ?>
    <article class="post-preview <?php echo $modifier; ?>">
        <div class="post-preview-image">
            <?php component('common/image', $image); ?>
        </div>

        <div class="post-preview-content-outer">
            <div class="post-preview-content">
                <?php component('common/content', [
                    'title'    => $title,
                    'content'  => $content
                ]); ?>
            </div>

            <div class="post-preview-link">
                <?php component('common/link', [
                    'title' => 'Läs mer',
                    'url'   => $link_url
                ]); ?>
            </div>
        </div>
    </article>
<?php endif; ?>