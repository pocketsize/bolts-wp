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
	<button class="button <?php echo $modifier; ?>" <?php echo $identifier; ?>>
		<span class="button-inner"><?php echo $title; ?></span>

		<?php if(!empty($url)): ?>
			<a class="button-link" href="<?php echo $url; ?>" target="<?php echo $target; ?>" <?php echo $rel; ?>></a>
		<?php endif; ?>
	</button>
<?php endif; ?>