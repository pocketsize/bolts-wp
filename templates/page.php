<?php

get_header();

component('layouts/full', [
	'common/content' => [
		'component' => 'content',
		'data' => [
			'title'   => get_title(),
			'content' => get_content()
		]
	]
]);

get_footer();
