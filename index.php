<?php get_header(); ?>

<?php $posts_page = get_post(get_option('page_for_posts')); ?>

<?php if ( $posts_page ) { ?>
	<section id="posts-page">
		<div class="container">
			<h2><?php echo $posts_page->post_title; ?></h2>

			<div class="user-content"><?php echo apply_filters( 'the_content', $posts_page->post_content ); ?></div>
		</div>
	</section>
<?php } ?>

<section id="posts">
	<?php get_template_part('loop'); ?>
</section>

<?php get_footer(); ?>