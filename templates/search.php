<?php get_header(); ?>

<?php component('layouts/full', [
	'content' => [
		[
			'component' => 'common/form',
			'data' => [
				'method' => 'get',
				'action' => esc_url( home_url( '/' ) ),
				'fields' => [
					[
						'component' => 'common/input-text',
						'data' => [
							'label' => 'Search',
							'name'  => 's'
						]
					],
					[
						'component' => 'common/button',
						'data' => [
							'title' => 'Search',
							'type'  => 'submit',
						]
					],
				]
			]
		],
		[
			'component' => 'search-results',
			'data' => [
				'items' => prepare_loop_for_search_results(),
			]
		]
	]
]); ?>

<?php get_footer(); ?>