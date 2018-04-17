<?php get_header(); ?>

<?php while (have_posts()) { the_post(); ?>
	
	<section class="post">
		<div class="post-container">

			<h1 class="post-title"><?php the_title(); ?></h1>

			<div class="post-content">
				<?php the_content(); ?>
			</div>

			<p class="post-meta">Posted on <span class="post-meta-date"><?php the_date(); ?></span> by <span class="post-meta-author"><?php the_author(); ?></span></p>

		</div>
	</section>
	
	<?php if (comments_open() || get_comments_number()) { comments_template('', true); } ?>
	
<?php } ?>

<?php get_footer(); ?>