<?php

component('page', [
    'sections' => [
        'component' => 'common/content',
        'data' => [
            'title'   => get_title(),
            'content' => get_content(),
            'meta'    => get_date()
        ]
    ]
]);
