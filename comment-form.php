<section id="respond" class="comment-respond">
	<div class="container">
	<?php if ( comments_open( $post_id ) ) { ?>

		<?php $commenter = wp_get_current_commenter(); ?>

		<h3>Leave a comment</h3>

		<?php if ( get_option( 'comment_registration' ) && !is_user_logged_in() ) { ?>
		
		<p>You must be logged in to leave a comment.</p>

		<?php } else { ?>

		<form action="<?php echo site_url( '/wp-comments-post.php' ); ?>" method="post" id="commentform" class="comment-form" novalidate>

			<?php if ( is_user_logged_in() ) { $current_user = wp_get_current_user(); ?>

			<p>You are logged in as <?php echo $current_user->display_name; ?> &mdash; <a href="<?php echo wp_logout_url( get_permalink( $post->ID ) ); ?>">Logout</a></p>

			<?php } else { ?>

			<p>Your e-mail will not be published.</p>

			<p class="comment-form-author">
				<label for="author">Name <span class="required">*</span></label>
				<input id="author" name="author" type="text" value="<?php echo esc_attr( $commenter['comment_author'] ); ?>" aria-required="true" required="required" />
			</p>

			<p class="comment-form-email">
				<label for="email">E-mail <span class="required">*</span></label>
				<input id="email" name="email" type="email" value="<?php echo esc_attr( $commenter['comment_author_email'] ); ?>" aria-describedby="email-notes" aria-required="true" required="required" />
			</p>

			<p class="comment-form-url">
				<label for="url">Website</label>
				<input id="url" name="url" type="url" value="<?php echo esc_attr( $commenter['comment_author_url'] ); ?>" />
			</p>
			
			<?php } ?>

			<p class="comment-form-comment">
				<label for="comment">Comment <span class="required">*</span></label>
				<textarea id="comment" name="comment" cols="45" rows="8"  aria-required="true" required="required"></textarea>
			</p>

			<input name="submit" type="submit" id="submit" class="submit" value="Post Comment" />

			<?php bolts_hidden_comment_form_fields(); ?>

		</form>

		<?php } ?>

	<?php } else { ?>

		<p>Comments are closed.</p>

	<?php } ?>
	</div>
</section>