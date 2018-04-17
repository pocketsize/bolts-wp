<?php get_header(); ?>

<section class="search">
	<div class="search-container">
		<?php get_search_form(); ?>
		
		<h2>Search results: <?php echo get_search_query(); ?></h2>
	</div>
</section>

<?php get_template_part('loop'); ?>

<?php get_footer(); ?>