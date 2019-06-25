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
        $data      = array_diff_key($section, array_flip(['acf_fc_layout']));

        switch ($component) {
            case 'content':
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
                        'content' => 'Read more label',
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
                'theme' => 'search',
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
                            'content' => 'Search',
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
                        'content' => 'Read more label',
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

function add_component_to_data_entries($component, $data_entries)
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



function nav_menu_walker(array &$elements, $parent_id = 0, $toggles = false, $level = 0)
{
    global $post;

    $branch = [];

    foreach ($elements as &$element) {
        $idk = [];
        $items = [];

        if ($element->menu_item_parent == $parent_id) {
            $modifiers = [];
            $modifiers[] = !empty($element->children) ? 'has-children' : '';
            $modifiers[] = $element->object_id == $post->ID ? 'is-current' : '';

            $target = !empty($element->target) ? $element->target : false;

            $items[] = [
                'component' => 'common/link',
                'data' => [
                    'theme'      => 'menu-link',
                    'attributes' => ['target' => $target],
                    'url'        => $element->url,
                    'content'    => $element->title
                ],
            ];

            $children = nav_menu_walker( $elements, $element->ID, $toggles, $level + 1 );

            if ($toggles && !empty($children)) {
                $items[] = [
                    'component' => 'forms/button',
                    'data' => [
                        'theme' => 'submenu-toggle',
                        'attributes' => ['data-submenu-toggle' => true],
                    ]
                ];
            }

            if ($children) {
                $items[] = [
                    'component' => 'common/menu',
                    'data' => [
                        'modifiers' => 'is-level-' . $level,
                        'items'     => $children
                    ]
                ];
            }

            $idk = [
                'modifiers' => modifiers($modifiers, false),
                'items' => $items
            ];

            $branch[] = $idk;

            unset($element);
        }
    }

    return $branch;
}

function get_nav_menu_array($location = false, $toggles = false)
{
    if (!$location) {
        $location = BOLTS_WP_DEFAULT_MENU_LOCATION;
    }

    $locations = get_nav_menu_locations();
    
    if (empty($locations) || !isset($locations[ $location ])) {
        return null;
    }

    $menu_id = $locations[ $location ];

    if (empty($menu_id)) {
        return false;
    }

    $items = wp_get_nav_menu_items( $menu_id );
    return  $items ? nav_menu_walker( $items, 0, $toggles, 1 ) : null;
}