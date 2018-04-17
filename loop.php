<?php if ( have_posts() ) { ?>

	<section class="posts">
		<div class="posts-wrapper">
			<?php while ( have_posts() ) { the_post(); ?>
				<article class="post">
					<div class="post-container">
						<h2 class="post-title"><a href="<?php the_permalink(); ?>" data-template-attr-href="{permalink}" data-template-html="{title}"><?php the_title(); ?></a></h2>

						<div class="post-content" data-template-html="{excerpt}"><?php the_excerpt(); ?></div>

						<?php if ( is_post_type('post') ) { ?>
							<p class="post-meta">Posted on <span class="post-meta-date" data-template-html="{date}"><?php the_date(); ?></span> by <span class="post-meta-author" data-template-html="{author}"><?php the_author(); ?></span></p>
						<?php } ?>
					</div>
				</article>
			<?php } ?>
		</div>

		<?php /* if ( has_more_posts() ) { ?>
			<button data-action="load-more" data-target=".posts">Load more</button>
			<?php bolts_load_more(); ?>
		<?php } */ ?>
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