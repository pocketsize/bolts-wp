<?php 
	/**
	 * Post preview
	 * 
	 * A preview of content, mostly post-type posts
	 * 
	 * @param string $image_url
	 * @param string $title
	 * @param string $content
	 * @param string $link_url
	 */

?>

<?php if(!empty($image_url) && !empty($title) && !empty($content)): ?>
	<article class="post-preview">
		<div class="post-preview-image">
			<?php component('common/image', [
				'url'          => $image_url,
				'overlay_text' => $image_text
			]); ?>
		</div>

		<div class="post-preview-content-outer">
			<div class="post-preview-content">
				<?php component('content', [
					'title'    => $title,
					'content'  => $content
				]); ?>
			</div>

			<div class="post-preview-link">
				<?php component('common/link', [
					'title' => 'Läs mer',
					'url'   => $link_url
				]); ?>
			</div>
		</div>

	</article>
<?php endif; ?>