<?php

get_header();

while (have_posts()) {
    the_post();

    component('layouts/full', [
        'content' => [
            'component' => 'content',
            'data' => [
                'title' => get_title(),
                'content' => apply_filters('the_content', get_dummy_content())
            ]
        ]
    ]);
}

get_footer();
