<?php
/**
 * Post preview
 *
 * A preview of content, mostly post-type posts
 *
 * @param string $image_url
 * @param string $title
 * @param string $content
 * @param string $link_url
 *
 * @param string $theme
 * @param string $modifier
 */

$image_url = !empty($image_url) ? $image_url : 'http://placehold.it/500';

$theme       = !empty($theme) ? $theme : 'default';
$theme_class = 'is-theme-' . $theme;
$modifier    = !empty($modifier) ? $modifier : '';
?>

<?php if (!empty($title) && !empty($content)) : ?>
    <article class="post-preview <?php echo $theme_class; ?> <?php echo $modifier; ?>">
        <div class="post-preview-image">
            <?php component('common/image', [
                'url'          => $image_url
            ]); ?>
        </div>

        <div class="post-preview-content-outer">
            <div class="post-preview-content">
                <?php component('content', [
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