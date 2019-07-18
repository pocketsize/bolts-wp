<?php
/**
 * @param string $theme - "default"
 * @param string $modifiers
 * @param string $attributes
 * @param array  $areas
 */

$attributes = attributes($attributes ?? '');
$modifiers  = modifiers($theme ?? null, $modifiers ?? null);
?>
<div class="layout <?php echo $modifiers; ?>" <?php echo $attributes; ?>>
	<div class="layout-inner">
		<?php if (!empty($areas)) : ?>
			<div class="layout-areas">
				<?php foreach ($areas as $area) : ?>
					<div class="layout-area <?php echo !empty($area['modifiers']) ? $area['modifiers'] : ''; ?>" <?php echo attributes($area['attributes'] ?? ''); ?>>
						<?php if (!empty($area['items'])) : ?>
							<div class="layout-items">
								<?php layout_items($area['items'], 'layout-item'); ?>
							</div>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</div>