<?php get_header(); ?>

<section id="search">
	<div class="container">
		<?php get_search_form(); ?>
		
		<h2>Search results: <?php echo get_search_query(); ?></h2>
	</div>
</section>

<section id="posts">
	<?php get_template_part('loop'); ?>
</section>

<?php get_footer(); ?>