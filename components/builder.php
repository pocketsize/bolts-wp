<?php
/**
 * Page builder
 *
 * Outputs components based on ACF flexible content.
 *
 * @param array $data
 */
?>

<?php if(!empty($data)): ?>
	<div class="builder">
		<?php foreach($data as $section): ?>
			<?php component($section['component'], $section['data']); ?>
		<?php endforeach; ?>
	</div>
<?php endif; ?>