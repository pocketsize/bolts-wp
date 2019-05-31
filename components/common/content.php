<?php
/**
 * Content
 *
 * @param string $theme
 * @param string $modifiers
 * @param string $attributes
 *
 * @param string $title
 * @param string $content
 * @param string $theme
 */

$attributes = attributes($attributes ?? '');
$modifiers  = modifiers($modifiers ?? null, $theme ?? null);

$title = !empty($title) ? $title : false;
$title = $title && is_string($title) ? ['title' => $title] : $title;

$lead = !empty($lead) ? $lead : false;

if ($lead) {
    $lead          = is_string($lead) ? ['content' => $lead] : $lead;
    $lead['theme'] = !empty($lead['theme']) ? $lead['theme'] : 'lead';
}

$content = !empty($content) ? $content : false;
$content = $content && is_string($content) ? ['content' => $content] : $content;
?>

<div class="content <?php echo $modifiers; ?>" <?php echo $attributes; ?>>
    <?php if (!empty($meta)) : ?>
        <div class="content-meta"><?php echo $meta; ?></div>
    <?php endif; ?>

    <?php if ($title) : ?>
        <div class="content-title">
            <?php component('common/title', $title); ?>
        </div>
    <?php endif; ?>

    <?php if ($lead) : ?>
        <div class="content-lead">
            <?php component('common/wysiwyg', $lead); ?>
        </div>
    <?php endif; ?>

    <?php if ($content) : ?>
        <div class="content-content">
            <?php component('common/wysiwyg', $content); ?>
        </div>
    <?php endif; ?>
</div>