<?php get_header(); ?>

<?php while (have_posts()) { the_post(); ?>

	<?php component('layouts/full', [
		'content' => [
			'component' => 'content',
			'data' => [
				'title'   => get_title(),
				'content' => get_content(),
				'meta'    => get_date()
			]
		]
	]); ?>
	
	<?php if ( comments_open() || get_comments_number() ) { comments_template( '', true ); } ?>
	
<?php } ?>

<?php get_footer(); ?>