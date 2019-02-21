<?php get_header(); ?>

<?php while (have_posts()) {
    the_post(); ?>

    <section class="page">
        <div class="page-container">
            <h2><?php the_title(); ?></h2>

            <div class="page-content"><?php the_content(); ?></div>
        </div>
    </section>

<?php } ?>

<?php get_footer(); ?>