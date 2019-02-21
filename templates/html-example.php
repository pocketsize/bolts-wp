<?php get_header(); ?>

<?php while ( have_posts() ) { the_post(); ?>

	<?php component('layouts/full', [
		'content' => [
			'component' => 'content',
			'data' => [
				'title' => get_title(),
				'content' => apply_filters( 'the_content', get_dummy_content() )
			]
		]
	]); ?>

<?php } ?>

<?php get_footer(); ?>