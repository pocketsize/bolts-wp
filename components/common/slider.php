<?php 
	/**
	 * Slider
	 * 
	 * @param array   $slides
	 * @param string  $slides.component
	 * @param string  $slides.data
	 * 
	 * @param string  $theme
	 * @param string  $type
	 * @param boolean $has_controls
	 * @param boolean $has_pagination
	 */

	$type      = !empty($type) ? $type : 'default';
	$type_attr = 'data-slider="' . $type . '"';
	$theme     = !empty($theme) ? 'is-theme-' . $theme : 'is-theme-default';
?>

<?php if(!empty($slides)): ?>
	<section class="slider">
		<div class="slider-inner" <?php echo $type_attr; ?>>
			<?php foreach( $slides as $slide ): ?>
				<div class="slider-slide" data-slide>
					<?php component($slide['component'], $slide['data']); ?>
				</div>
			<?php endforeach; ?>	
		</div>

		<?php if(!empty($has_controls)): ?>
			<button class="slider-control is-previous" data-control="previous">
				<?php svg('images/arrow-white'); ?>
			</button>
			<button class="slider-control is-next" data-control="next">
				<?php svg('images/arrow-white'); ?>
			</button>
		<?php endif; ?>

		<?php if(!empty($has_pagination)): ?>
			<nav class="slider-pagination">
				<?php foreach( $slides as $i => $slide ): ?>
					<button class="slider-dot <?php if( $i == 0 ){ echo 'is-active'; } ?>" data-dot></button>
				<?php endforeach; ?>	
			</nav>
		<?php endif; ?>
	</section>
<?php endif; ?>