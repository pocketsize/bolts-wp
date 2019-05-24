<?php

/**
 * Getting data from ACF page builder
 */

function get_page_builder_sections()
{
    if (!function_exists('get_field')) {
        return false;
    }

    $sections = get_field('sections');

    if (empty($sections)) {
        return false;
    }

    $items = [];

    foreach ($sections as $section) {
        $component = $section['acf_fc_layout'];
        $data = array_diff_key($section, array_flip(['acf_fc_layout']));

        switch ($component) {
            case 'content' :
                $component = 'common/content';

                /* if (!empty($data['image']) {
                    $data['image'] = get_media($data['image'], 'medium');
                } */
            break;
        }

        $items[] = [
            'component' => $component,
            'data'      => $data
        ];
    }

    return ['sections' => $items];
}

/**
 * Get and format posts from loop
 */

function get_posts_from_loop()
{
    $items = [];

    if (have_posts()) {
        while (have_posts()) {
            the_post();

            $items[] = [
                'component' => 'post-preview',
                'data' => [
                    'image'   => get_featured_image(),
                    'meta'    => get_date(),
                    'title'   => get_title(),
                    'excerpt' => get_excerpt(),
                    'link'    => [
                        'title' => 'Read more label',
                        'url' => get_permalink()
                    ]
                ]
            ];
        }
    }

    return $items;
}

/**
 * Get and format search results from the loop
 */

function get_search_results()
{
    $items = [
        [
            'component' => 'forms/form',
            'data' => [
                'theme' => 'search-form',
                'method' => 'get',
                'action' => esc_url(home_url('/')),
                'fields' => [
                    [
                        'component' => 'forms/text-input',
                        'data' => [
                            'label' => 'Search label',
                            'name'  => 's'
                        ]
                    ],
                    [
                        'component' => 'forms/button',
                        'data' => [
                            'title' => 'Search',
                            'type'  => 'submit',
                        ]
                    ]
                ]
            ]
        ]
    ];

    if (have_posts()) {
        while (have_posts()) {
            the_post();

            $items[] = [
                'component' => 'post-preview',
                'data' => [
                    'image'   => get_featured_image(),
                    'meta'    => get_date(),
                    'title'   => get_title(),
                    'excerpt' => get_excerpt(),
                    'link'    => [
                        'title' => 'Read more label',
                        'url' => get_permalink()
                    ]
                ]
            ];
        }
    } else {
        $items = [
            'component' => 'common/content',
            'data' => [
                'title' => 'No results message'
            ]
        ];
    }

    return $items;
}

function get_footer_content()
{
    return [
        'content' => 'Footer content'
    ];
}

/**
 * Pair an array of componentless data entries with a component
 */

function add_component_to_data_entries($data_entries, $component)
{
    if (!$data_entries || !$component || !is_array($data_entries)) {
        return false;
    }

    $result = [];

    if (!empty($data_entries)) {
        foreach ($data_entries as $data) {
            $result[] = [
                'component' => $component,
                'data'      => $data
            ];
        }
    }

    return $result;
}