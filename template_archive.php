<?php 
	/**
	 * Single archive template
	 * 
	 * Refrain from using WP's own archive pages if possibe.
	 * Create them as pages instead.
	 * 
	 * Page templates that largely share codebase should use 
	 * templates. As the theme is currently there is only one 
	 * post type and only one archive page, but as the project
	 * grows, so does the need for other post types.
	 * 
	 * Check out ./page_archive-post.php for usage
	 * 
	 * @param array $items 
	 */
?>

<?php get_header(); ?>

<?php if($items): ?>

	<?php foreach($items as $item): ?>

		<?php component('post-preview', $item); ?>

	<?php endforeach; ?>

<?php else: ?>

	<?php component('content', ['content' => 'Det finns ingenting att visa']); ?>

<?php endif; ?>

<?php get_footer(); ?>