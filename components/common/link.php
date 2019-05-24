<?php
/**
 * Link
 *
 * @param string $theme
 * @param string $modifiers
 * @param string $attributes
 *
 * @param string $title
 * @param string $target
 * @param string $url
 *
 */

if (empty($url)) return false;
$target = !empty($target) ? $target : false;
$theme  = !empty($theme)  ? $theme  : null;

$modifiers  = modifiers($modifiers ?? null, $theme);
$attributes = get_attributes($attributes ?? '', [
    'href'   => $url,
    'target' => $target
]);

if (!empty($attributes['target']) && empty($attributes['rel'])) {
    $attributes['rel'] = 'noopener noreferrer';
}

?>

<a class="link <?php echo $modifiers; ?>" <?php echo attributes($attributes); ?>>
    <?php if (!empty($title) && $theme != 'overlay') : ?>
        <span class="link-inner"><?php echo $title; ?></span>
    <?php endif; ?>
</a>