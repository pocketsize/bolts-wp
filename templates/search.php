<?php

get_header();

component('layouts/full', [
    'content' => [
        [
            'component' => 'forms/form',
            'data' => [
                'method' => 'get',
                'action' => esc_url( home_url( '/' ) ),
                'fields' => [
                    [
                        'component' => 'forms/input-text',
                        'data' => [
                            'label' => 'Search',
                            'name'  => 's'
                        ]
                    ],
                    [
                        'component' => 'forms/button',
                        'data' => [
                            'title' => 'Search',
                            'type'  => 'submit',
                        ]
                    ],
                ]
            ]
        ],
        [
            'component' => 'search-results',
            'data' => [
                'items' => prepare_loop_for_search_results(),
            ]
        ]
    ]
]);

get_footer();
