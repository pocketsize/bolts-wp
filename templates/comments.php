<?php $comments = get_comments('post_id=' . $post->ID); ?>

<?php if ($comments > 0) { ?>
    <section class="comments">
        <div class="comments-container">
            <h2 class="comments-title">Comments (<?php echo get_comments_number(); ?>)</h2>

            <div class="comments-wrapper">
                <?php foreach ($comments as $comment) { ?>
                    <article class="comment" id="comment-<?php echo $comment->comment_ID; ?>">
                        <div class="comment-content">
                            <?php echo apply_filters('the_content', $comment->comment_content); ?>
                        </div>

                        <p class="comment-meta">Posted on <span class="comment-meta-date"><?php echo date(get_option('date_format'), strtotime($comment->comment_date)); ?></span> by <span class="comment-meta-author"><?php echo $comment->comment_author; ?>:</span></p>
                    </article>
                <?php } ?>
            </div>
        </div>
    </section>

<?php } ?>

<?php if (comments_open()) { ?>
    <?php comment_form(); ?>

<?php } ?>