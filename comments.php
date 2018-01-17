<?php $comments = get_comments('post_id=' . $post->ID); ?>

<?php if ($comments > 0) { ?>

<section id="comments">
	<div class="container">
		<h3>Comments (<?php echo get_comments_number(); ?>)</h3>

		<div class="comments">
			<?php foreach($comments as $comment) { ?>
			<article class="comment" id="comment-<?php echo $comment->comment_ID; ?>">
				<h4><?php echo $comment->comment_author; ?>:</h4>

				<?php echo wpautop( $comment->comment_content ); ?>

				<?php echo date(get_option('date_format'), strtotime($comment->comment_date) ); ?>
			</article>
			<?php } ?>
		</div>
	</div>
</section>

<?php } ?>

<?php if (comments_open()) { ?>

	<?php bolts_comment_form(); ?>

<?php } ?>