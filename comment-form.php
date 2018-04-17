<section class="comment-form">
	<div class="comment-form-container">
	<?php if ( comments_open( $post_id ) ) { ?>

		<?php $commenter = wp_get_current_commenter(); ?>

		<h2 class="comment-form-title">Leave a comment</h2>

		<?php if ( get_option( 'comment_registration' ) && !is_user_logged_in() ) { ?>
		
		<div class="comment-form-content">
			<p>You must be logged in to leave a comment.</p>
		</div>

		<?php } else { ?>

		<form action="<?php echo site_url( '/wp-comments-post.php' ); ?>" method="post" class="comment-form" novalidate>

			<?php if ( is_user_logged_in() ) { $current_user = wp_get_current_user(); ?>

			<div class="comment-form-content">
				<p>You are logged in as <?php echo $current_user->display_name; ?> &mdash; <a href="<?php echo wp_logout_url( get_permalink( $post->ID ) ); ?>">Logout</a></p>
			</div>

			<?php } else { ?>

			<div class="comment-form-content">
				<p>Your e-mail will not be published.</p>
			</div>

			<p class="comment-form-author">
				<label class="comment-form-author-label" for="author">Name <span class="required">*</span></label>
				<input class="comment-form-author-input" name="author" type="text" value="<?php echo esc_attr( $commenter['comment_author'] ); ?>" aria-required="true" required="required" />
			</p>

			<p class="comment-form-email">
				<label class="comment-form-email-label" for="email">E-mail <span class="required">*</span></label>
				<input class="comment-form-email-input" name="email" type="email" value="<?php echo esc_attr( $commenter['comment_author_email'] ); ?>" aria-required="true" required="required" />
			</p>

			<p class="comment-form-url">
				<label class="comment-form-url-label" for="url">Website</label>
				<input class="comment-form-url-input" name="url" type="url" value="<?php echo esc_attr( $commenter['comment_author_url'] ); ?>" />
			</p>
			
			<?php } ?>

			<p class="comment-form-comment">
				<label class="comment-form-comment-label" for="comment">Comment <span class="required">*</span></label>
				<textarea class="comment-form-comment-textarea" name="comment" required="required"></textarea>
			</p>

			<input class="comment-form-submit" name="submit" type="submit" value="Post Comment" />

			<?php bolts_hidden_comment_form_fields(); ?>

		</form>

		<?php } ?>

	<?php } else { ?>

		<div class="comment-form-content">
			<p>Comments are closed.</p>
		</div>

	<?php } ?>
	</div>
</section>