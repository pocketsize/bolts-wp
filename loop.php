<?php if (have_posts()) { ?>
	<div class="posts">
		<?php while (have_posts()) { the_post(); ?>
			<article class="post">
				<div class="container">
					<h3><a href="<?php the_permalink(); ?>" data-template-attr-href="{permalink}" data-template-html="{title}"><?php the_title(); ?></a></h3>

					<div class="user-content" data-template-html="{excerpt}"><?php the_excerpt(); ?></div>

					<?php if ( is_post_type('post') ) { ?>
						<p>Posted on <span data-template-html="{date}"><?php the_date(); ?></span> by <span data-template-html="{author}"><?php the_author(); ?></span></p>
					<?php } ?>
				</div>
			</article>
		<?php } ?>
	</div>

	<?php if ( has_more_posts() ) { ?>
		<button data-action="load-more" data-target=".posts">Load more</button>
		<?php bolts_load_more(); ?>
	<?php } ?>
<?php } else { ?>
	<article>
		<div class="container">
			<p>No posts were found.</p>
		</div>
	</article>
<?php } ?>