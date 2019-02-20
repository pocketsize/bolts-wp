<?php 
/**
 * Button
 * 
 * @param string $title
 * @param string $target
 * @param string $url
 * @param string $identifier
 * @param string $theme - "default"
 * @param string $type
 */


$modifier = !empty($theme) ? 'is-theme-' . $theme : 'is-theme-default';
$target   = !empty($target) ? $target : '';
$rel      = $target == '_blank' ? 'rel="noopener noreferrer"' : '';
$type     = !empty($type) ? 'type="' . $type . '"' : '';

// TODO: review this:
// $identifier = !empty($identifier) ? 'data-click="' . $identifier . '"' : '';
?>

<?php if(!empty($title)): ?>
	<div class="button <?php echo $modifier; ?>" <?php echo $identifier; ?>>
		<button class="button-inner" <?php echo $type ?>><?php echo $title; ?></button>

		<?php if(!empty($url)): ?>
			<a class="button-link" href="<?php echo $url; ?>" target="<?php echo $target; ?>" <?php echo $rel; ?>></a>
		<?php endif; ?>
	</div>
<?php endif; ?>