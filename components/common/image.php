<?php 
/**
 * Image
 * 
 * Used for all images. Can be passed either
 * a URL or a media ID for the image. URL always
 * trumps the ID
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
 * @param string $url
 * @param int    $media_id
 * @param string $media_size   - defaults to "full"
 * @param string $caption
 * @param bool   $has_overlay
 * @param string $overlay_text
 * @param string $modifier
 */


// Setting up modifiers used for classes
$modifier        = !empty($modifier) ? ' ' . $modifier : 'is-default';                 // block-level modifiers are in $modifier
$object_modifier = !empty($has_overlay) || !empty($overlay_text) ? 'has-overlay' : ''; // element-level modifiers are prefixed with the element

// Nullchecks and defaults
$caption    = !empty($caption)    ? $caption : false;
$media_size = !empty($media_size) ? $media_size : 'full';
$media_url  = !empty($media_id)   ? get_media($media_id, $media_size) : false;
$url        = !empty($url)        ? $url : $media_url;
?>

<?php if(!empty($url)): ?>
	<figure class="image <?php echo $modifier; ?>">
		<div class="image-object <?php echo $object_modifier; ?>" style="background-image:url('<?php echo $url; ?>')">
			<?php if(!empty($overlay_text)): ?>
				<div class="image-overlay-text"><?php echo $overlay_text; ?></div>
			<?php endif; ?>
		</div>

		<?php if(!empty($caption)): ?>
			<figcaption class="image-caption"><?php echo $caption; ?></figcaption>
		<?php endif; ?>
	</figure>
<?php endif; ?>