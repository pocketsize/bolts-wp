<?php get_header(); ?>

<?php $posts_page = get_post(get_option('page_for_posts')); ?>

<?php if ( $posts_page ) { ?>
	<section class="posts-page">
		<div class="posts-page-container">
			<h1 class="posts-page-title"><?php echo $posts_page->post_title; ?></h2>

			<div class="posts-page-content">
				<?php echo apply_filters( 'the_content', $posts_page->post_content ); ?>
			</div>
		</div>
	</section>
<?php } ?>

<?php if ( have_posts() ) { ?>

	<section class="posts">
		<div class="posts-container">
			<?php

			while ( have_posts() ) {

				the_post();
				
				component('post', array(
					'id'        => $post->ID,
					'type'      => $post->post_type,
					'permalink' => get_permalink($post->ID), 
					'title'     => get_title($post->ID, true),
					'content'   => get_content($post->ID, true),
					'date'      => get_the_date(null, $post->ID),
					'author'    => get_author($post->ID)
				));

			}

			?>
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

<?php get_footer(); ?>