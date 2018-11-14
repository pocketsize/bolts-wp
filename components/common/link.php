<?php 
	/**
	 * Link
	 * 
	 * @param string $title
	 * @param string $target
	 * @param string $url
	 * @param string $theme
	 * @param string $custom_attrs
	 */


	$modifier     = !empty($theme) ? 'is-theme-' . $theme : 'is-theme-default';
	$target       = !empty($target) ? $target : '';
	$rel          = $target == '_blank' ? 'rel="noopener noreferrer"' : '';
	$custom_attrs = !empty($custom_attrs) ? $custom_attrs : '';
?>

<?php if(!empty($title) && !empty($url)): ?>
	<a 
		class="link <?php echo $modifier; ?>" 
		href="<?php echo $url; ?>" 
		target="<?php echo $target; ?>" 
		<?php echo $rel; ?> 
		<?php echo $custom_attrs; ?>
	>
		<span class="link-inner"><?php echo $title; ?></span>
	</a>
<?php endif; ?>