<?php

$sections = [];

$posts_page = get_option('page_for_posts');

if (!empty($posts_page)) {
    $sections[] = [
        'component' => 'common/content',
        'data' => [
            'modifiers' => 'is-contained',
            'title'     => get_title($posts_page),
            'content'   => get_content($posts_page)
        ]
    ];
}

if (have_posts()) {
    $items = [];

    while (have_posts()) {
        the_post();

        $items[] = [
            'component' => 'cards/post-card',
            'data' => [
                'image'   => get_featured_image(),
                'date'    => get_post_type(),
                'title'   => get_title(),
                'excerpt' => get_excerpt(),
                'link'    => [
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

    $links = get_pagination_links();

    if (!empty($links)) {
        $sections[] = [
            'component' => 'common/layout',
            'data' => [
                'theme' => 'pagination',
                'items' => $links
            ]
        ];
    }
} else {
    $sections[] = [
        'component' => 'common/content',
        'data' => [
            'content' => 'No results message'
        ]
    ];
}

page([
    'sections' => $sections
]);