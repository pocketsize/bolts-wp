<?php
/**
 * Image
 *
 * Used for all images. Can be passed either
 * a URL or a media ID for the image. URL always
 * trumps the ID.
 *
 * Image can optionally be lazyloaded by passing true or a string
 * to $lazyload. The string becomes a lazyload-class and therefore
 * we can use different reveal animations on different types of
 * images on the site.
 *
 * This file is also an example of how a basic component
 * is written:
 *
 * - Documentation at the top, with all params as a minimum
 * - Nullchecks and simple data transformation
 * - Markup with as little logic as possible
 *
 * Lets check it out
 *
 * @param string      $url
 * @param int         $media_id
 * @param string      $media_size   - "full" (default)
 * @param string      $caption
 * @param bool        $has_overlay
 * @param string      $overlay_text
 * @param string|bool $lazyload     - "default"
 *
 * @param string      $theme
 * @param string      $modifier     - "is-overlay"
 */

$modifier        = modifier($theme ?? null, $modifier ?? null);
$object_modifier = !empty($has_overlay) || !empty($overlay_text) ? 'has-overlay' : '';

// TODO: update this
$lazyload        = !empty($lazyload) ? $lazyload : false;
$lazyload        = !empty($lazyload) && $lazyload === true ? 'default' : $lazyload;
$lazyload_class  = 'is-lazyload-' . $lazyload;

// Nullchecks and defaults
$caption    = !empty($caption)    ? $caption : false;
$media_size = !empty($media_size) ? $media_size : 'full';
$media_url  = !empty($media_id)   ? get_media($media_id, $media_size) : false;
$url        = !empty($url)        ? $url : $media_url;
$style_tag  = !empty($lazyload)   ? '' : 'style="background-image:url(' . $url . ')"';
?>

<?php if (!empty($url)) : ?>
    <figure
        class="image <?php echo $modifier; ?> <?php echo $lazyload_class; ?>"
        data-lazy-image-root
    >
        <div class="image-inner">
            <div class="image-object <?php echo $object_modifier; ?>" <?php echo $style_tag; ?> data-lazy-image>
                <?php if (!empty($lazyload)) : ?>
                    <img
                        class="image-element"
                        data-src="<?php echo $url; ?>"
                        alt="<?php echo $caption; ?>"
                        data-lazy-image-trigger
                    >
                <?php else : ?>
                    <img
                        class="image-element"
                        src="<?php echo $url; ?>"
                        alt="<?php echo $caption; ?>"
                    >
                <?php endif; ?>

                <?php if (!empty($overlay_text)) : ?>
                    <div class="image-overlay-text"><?php echo $overlay_text; ?></div>
                <?php endif; ?>
            </div>
        </div>

        <?php if (!empty($caption)) : ?>
            <figcaption class="image-caption"><?php echo $caption; ?></figcaption>
        <?php endif; ?>
    </figure>
<?php endif; ?>