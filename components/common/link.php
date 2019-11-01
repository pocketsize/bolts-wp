<?php
/**
 * Link
 *
 * @param string $theme
 * @param string $modifiers
 * @param string $attributes
 *
 * @param string $content
 * @param string $target
 * @param string $url
 *
 */

if (empty($url)) {
    return false;
}

$target = !empty($target) ? $target : false;
$theme  = isset($theme)   ? $theme  : null;

$modifiers  = modifiers($modifiers ?? null, $theme);
$attributes = get_attributes($attributes ?? '', [
    'href'   => $url,
    'target' => $target
]);

if (!empty($attributes['target']) && in_array($attributes['target'], ['_blank', '_new']) && (isset($attributes['rel']) && $attributes['rel'] !== false)) {
    $attributes['rel'] = 'noopener noreferrer';
}
?>
<a class="link <?php echo $modifiers; ?>" <?php echo attributes($attributes); ?>>
    <?php if (!empty($content)) : ?>
        <span class="link-inner"><?php echo $content; ?></span>
    <?php endif; ?>
</a>