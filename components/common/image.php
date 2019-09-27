<?php
/**
 * Image
 *
 * @param string $theme (default, overlay)
 * @param string $modifiers (is-contain)
 *
 * @param string $url
 * @param string $alt
 *
 */

if (empty($url)) {
    return false;
}

$modifiers  = modifiers($modifiers ?? null, $theme ?? null);
$attributes = get_attributes($attributes ?? '');

$attributes['style'] = !empty($theme) && $theme == 'overlay' ? 'background-image: url(' . $url . ');' : false;

$img = !empty($img) ? $img : [];

$img['attributes'] = get_attributes($img['attributes'] ?? null, [
    'src' => $url,
    'alt' => true
]);
?>
<div class="image <?php echo $modifiers; ?>" <?php echo attributes($attributes); ?>>
    <img class="image-img" <?php echo attributes($img['attributes']); ?>>
</div>