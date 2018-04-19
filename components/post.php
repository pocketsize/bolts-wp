<?php $class = isset($class) ? $class : 'post'; ?>

<article class="<?php echo $class; ?> type-<?php echo $type; ?>">
	<div class="<?php echo $class; ?>-container">
		<h2 class="<?php echo $class; ?>-title"><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></h2>

		<div class="<?php echo $class; ?>-content"><?php echo $content; ?></div>

		<?php if ( $type == 'post' ) { ?>
			<p class="<?php echo $class; ?>-meta">Posted on <span class="<?php echo $class; ?>-meta-date"><?php echo $date; ?></span> by <span class="<?php echo $class; ?>-meta-author"><?php echo $author; ?></span></p>
		<?php } ?>
	</div>
</article>