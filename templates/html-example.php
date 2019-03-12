<?php

get_header();

component('layouts/full', [
    'common/content' => [
        'component' => 'content',
        'data' => [
            'title' => get_title(),
            'content' => apply_filters('the_content', get_dummy_content())
        ]
    ]
]);

get_footer();
