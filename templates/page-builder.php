<?php // Template Name: Page Builder

$sections = [];

if (get_field('display_page_content')) {
	$featured_image = get_featured_image();

	if (!empty($featured_image)) {
		$modifiers = array_diff($modifiers, ['has-top-offset']);

		$sections[] = [
			'component' => 'common/image',
			'data' => [
				'url' => $featured_image
			]
		];
	}

	$sections[] = [
		'component' => 'common/content',
		'data' => [
			'title' => get_title(),
			'content' => get_content()
		]
	];
}

$builder_sections = get_page_builder_sections();

if (!empty($builder_sections)) {
	foreach ($builder_sections as $section) {
		$sections[] = $section;
	}
}

page([
	'sections' => $sections
]);