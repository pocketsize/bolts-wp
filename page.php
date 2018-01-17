<?php get_header(); ?>

<?php while (have_posts()) { the_post(); ?>

	<section id="page">
		<div class="container">
			<h2><?php the_title(); ?></h2>

			<div class="user-content"><?php the_content(); ?></div>
		</div>
	</section>

<?php } ?>

<?php get_footer(); ?>