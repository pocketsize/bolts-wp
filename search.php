<?php

$sections = [
    [
        'component' => 'forms/form',
        'data' => [
            'theme' => 'search',
            'attributes' => [
                'method' => 'get',
                'action' => esc_url(home_url('/'))
            ],
            'fields' => [
                [
                    'component' => 'forms/text-input',
                    'data' => [
                        'label' => 'Search label',
                        'input' => [
                            'attributes' => [
                                'name'  => 's'
                            ]
                        ]
                    ]
                ],
                [
                    'component' => 'forms/button',
                    'data' => [
                        'content' => 'Search',
                        'type' => 'submit',
                    ]
                ]
            ]
        ]
    ]
];

if (have_posts()) {
    $items = [];

    while (have_posts()) {
        the_post();

        $items[] = [
            'component' => 'cards/search-card',
            'data' => [
                'post_type' => get_post_type(),
                'title'     => get_title(),
                'excerpt'   => get_excerpt(),
                'link'      => [
                    'content' => 'Read more',
                    'url' => get_permalink()
                ]
            ]
        ];
    }

    $sections[] = [
        'component' => 'common/layout',
        'data' => [
            'theme' => 'cards',
            'items' => $items
        ]
    ];
} else {
    $sections = [
        'component' => 'common/content',
        'data' => [
            'content' => 'No results message'
        ]
    ];
}

page([
    'sections' => $sections
]);
