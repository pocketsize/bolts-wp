<?php
/**
 * Image
 *
 * @param string $url
 * @param string $alt
 *
 * @param string $theme (default, overlay)
 * @param string $modifiers (is-contain)
 */

if (empty($url)) return false;

$modifiers  = modifiers($modifiers ?? null, $theme ?? null);
$attributes = get_attributes($attributes ?? '');

$attributes['style'] = !empty($theme) && $theme == 'overlay' ? 'background-image: url(' . $url . ');' : false;
$element_attributes = get_attributes($element_attributes ?? null, [
    'src' => $url,
    'alt' => true
]);
?>

<div class="image <?php echo $modifiers; ?>" <?php echo attributes($attributes); ?>>
    <img class="image-element" <?php echo attributes($element_attributes); ?>>
</div>