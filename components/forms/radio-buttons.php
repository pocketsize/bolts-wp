<?php
	/**
	 * Radio buttons
	 *
	 * Renders a collection of radio buttons with included field info.
     *
     * Automatically sets name for all radio buttons based on the title
     * provided to the field info
	 *
	 * @param string $title
	 * @param string $description
	 * @param string $name
	 * @param string $identifier
	 * @param bool   $is_required
	 * @param string $error_text   - displays when validation fails
	 *
	 * @param array  $options
	 * @param array  $options[i].option - see radio-button.php
	 */

    $name        = !empty($name) ? $name : $title;
	$identifier  = !empty($identifier) ? $identifier : $title;
	$is_required = !empty($is_required) ? $is_required : false;
	$error_text  = !empty($error_text) ? $error_text : false;
?>

<?php if(!empty($options)): ?>
	<fieldset class="radio-buttons">
		<?php if(!empty($title) || !empty($description)): ?>
			<div class="radio-buttons-info">
				<?php component('forms/field-info', [
					'title'       => $title,
					'description' => $description,
					'identifier'  => $identifier,
					'is_required' => $is_required,
					'error_text'  => $error_text
				]); ?>
			</div>
		<?php endif; ?>

		<div class="radio-buttons-options">
			<?php foreach($options as $option): ?>
				<div class="radio-buttons-option">
			        <?php
						$option['name'] = !empty($option['name']) ? $option['name'] : $name;
						$option['identifier'] = !empty($option['identifier']) ? $option['identifier'] : $identifier . ': ' . $option['title'];
					?>
					<?php component('forms/radio-button', $option); ?>
				</div>
			<?php endforeach; ?>
		</div>
	</fieldset>
<?php endif; ?>