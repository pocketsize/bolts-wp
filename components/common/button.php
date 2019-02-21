<?php 
	/**
	 * Button
	 * 
	 * @param string $title
	 * @param string $target
	 * @param string $url
	 * @param string $identifier
	 * @param string $theme - "default"
	 */


	$modifier = !empty($theme) ? 'is-theme-' . $theme : 'is-theme-default';
	$target   = !empty($target) ? $target : '';
	$rel      = $target == '_blank' ? 'rel="noopener noreferrer"' : '';

	$identifier = !empty($identifier) ? 'data-click="' . $identifier . '"' : '';
?>

<?php if(!empty($title)): ?>
	<div class="button <?php echo $modifier; ?>" <?php echo $identifier; ?>>
		<button class="button-inner"><?php echo $title; ?></button>

		<?php if(!empty($url)): ?>
			<a class="button-link" href="<?php echo $url; ?>" target="<?php echo $target; ?>" <?php echo $rel; ?>></a>
		<?php endif; ?>
	</div>
<?php endif; ?>