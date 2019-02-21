<?php get_header(); ?>

<section class="search">
    <div class="search-container">
        <?php get_search_form(); ?>
        
        <h2>Search results: <?php echo get_search_query(); ?></h2>
    </div>
</section>

<?php if (have_posts()) { ?>
    <section class="search-results">
        <div class="search-results-wrapper">
            <?php

            while (have_posts()) {
                the_post();
                
                component('post', [
                    'class'     => 'search-result',
                    'id'        => $post->ID,
                    'type'      => $post->post_type,
                    'permalink' => get_permalink($post->ID),
                    'title'     => get_title($post->ID, true),
                    'content'   => get_content($post->ID, true),
                    'date'      => get_the_date(null, $post->ID),
                    'author'    => get_author($post->ID)
                ]);
            }

            ?>
        </div>
    </section>

<?php } else { ?>
    <section class="no-search-results">
        <div class="no-search-results-container">
            <div class="no-search-results-content">
                <p>No search results for your query</p>
            </div>
        </div>
    </section>

<?php } ?>

<?php get_footer(); ?>