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
    while (have_posts()) {
        the_post();

        $sections[] = [
            'component' => 'post-preview',
            'data' => [
                'image'   => get_featured_image(),
                'meta'    => get_date(),
                'title'   => get_title(),
                'excerpt' => get_excerpt(),
                'link'    => [
                    'content' => 'Read more label',
                    'url' => get_permalink()
                ]
            ]
        ];
    }
} else {
    $sections = [
        'component' => 'common/content',
        'data' => [
            'title' => 'No results message'
        ]
    ];
}

page([
    'sections' => $sections
]);
