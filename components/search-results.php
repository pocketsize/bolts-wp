<?php
/**
 * Search results
 *
 * @param string $items
 *
 * @param string $theme
 * @param string $modifier
 */

$attributes = attributes($attributes ?? '');
$modifiers  = modifiers($modifiers ?? null, $theme ?? null);
?>

<div class="search-results <?php echo $modifiers; ?>" <?php echo $attributes; ?>>
    <div class="search-results-inner">
        <?php if (!empty($items)) : ?>
            <?php foreach ($items as $item) : ?>
                <?php component('post-preview', [
                    'image_url' => $item['image'],
                    'title'     => $item['title'],
                    'content'   => $item['content'],
                    'link_url'  => $item['permalink']
                ]); ?>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="search-results-message-outer">
                <p class="search-results-message">We could not find any results for your search query.</p>
            </div>
        <?php endif; ?>
    </div>
</div>