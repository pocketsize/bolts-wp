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

<?php get_template_part('loop'); ?>

<?php get_footer(); ?>