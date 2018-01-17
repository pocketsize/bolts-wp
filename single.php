<?php get_header(); ?>

<?php while (have_posts()) { the_post(); ?>
	
	<section id="single">

		<article>
			<div class="container">

				<h2><?php the_title(); ?></h2>
				<?php the_content(); ?>

				<p>Posted on <?php the_date(); ?> by <?php the_author(); ?></p>

			</div>
		</article>

	</section>
	
	<?php if (comments_open() || get_comments_number()) { comments_template('', true); } ?>
	
<?php } ?>

<?php get_footer(); ?>