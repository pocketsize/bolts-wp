<?php

page([
    'sections' => [
        'component' => 'common/content',
        'data' => [
            'title'   => get_title(),
            'content' => get_content()
        ]
    ]
]);
