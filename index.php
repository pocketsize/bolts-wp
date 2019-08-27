<?php

$sections = [];

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
}

page([
    'sections' => $sections
]);
