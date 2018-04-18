<?php if ( have_posts() ) { ?>

	<section class="posts">
		<div class="posts-wrapper">
			<?php while ( have_posts() ) { the_post(); ?>
				<article class="post">
					<div class="post-container">
						<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

						<div class="post-content"><?php the_excerpt(); ?></div>

						<?php if ( is_post_type('post') ) { ?>
							<p class="post-meta">Posted on <span class="post-meta-date"><?php the_date(); ?></span> by <span class="post-meta-author"><?php the_author(); ?></span></p>
						<?php } ?>
					</div>
				</article>
			<?php } ?>
		</div>
	</section>

<?php } else { ?>

	<section class="no-posts">
		<div class="no-posts-container">
			<div class="no-posts-content">
				<p>No posts were found.</p>
			</div>
		</div>
	</section>

<?php } ?>