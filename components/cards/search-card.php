<?php
/**
 * Search card
 *
 * @param string $theme
 * @param string $modifier
 * @param string $attributes
 *
 * @param string $post_type
 * @param string $title
 * @param string $excerpt
 * @param string $link
 */

$attributes = attributes($attributes ?? '');
$modifiers  = modifiers($modifiers ?? null, $theme ?? null);
?>

<article class="search-card <?php echo $modifiers; ?>" <?php echo $attributes; ?>>
    <?php if (!empty($title)) : ?>
        <div class="search-card-title">
            <?php component('common/content', [
                'meta'    => $post_type,
                'title'   => $title,
                'content' => $excerpt
            ]); ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($link)) : ?>
        <div class="search-card-link">
            <?php component('common/link', $link); ?>
        </div>
    <?php endif; ?>
</article>