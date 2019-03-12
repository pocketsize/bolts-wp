<?php

get_header();

component('layouts/full', [
    'content' => [
        'component' => 'common/content',
        'data' => [
            'title'   => get_title(),
            'content' => get_content(),
            'meta'    => get_date()
        ]
    ]
]);

get_footer();
