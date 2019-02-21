<?php
	/**
	 * Checkboxes
	 *
	 * A collection of checkboxes with included field info
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
	<fieldset class="checkboxes">
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

		<div class="checkboxes-options">
			<?php foreach($options as $option): ?>
                <?php
					$option['name'] = !empty($option['name']) ? $option['name'] : $name;
					$option['identifier'] = !empty($option['identifier']) ? $option['identifier'] : $identifier . ': ' . $option['title'];
				?>

				<div class="checkboxes-option">
					<?php component('forms/checkbox', $option); ?>
				</div>
			<?php endforeach; ?>
		</div>
	</fieldset>
<?php endif; ?>
