<?php

/**
 * Nav menu walker
 */

function nav_menu_walker(array &$elements, $parent_id = 0, $toggles = false, $level = 0)
{
    global $post;

    $branches = [];

    foreach ($elements as &$element) {
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
                        'attributes' => [
                            'data-bolts-action' => 'toggle',
                            'data-bolts-target' => 'menu-item',
                            'data-bolts-value' => 'open',
                            'data-bolts-parameters' => 'closest'
                        ],
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

            $branches[] = [
                'modifiers' => modifiers($modifiers, false),
                'items' => $items
            ];

            unset($element);
        }
    }

    return $branches;
}

/**
 * Get nav menu array
 */

function get_nav_menu_array($location = false, $toggles = false)
{
    if (!$location) {
        $location = BOLTS_WP_DEFAULT_MENU_LOCATION;
    }

    $locations = get_nav_menu_locations();
    
    if (empty($locations) || !isset($locations[$location])) {
        return null;
    }

    $menu_id = $locations[ $location ];

    if (empty($menu_id)) {
        return false;
    }

    $items = wp_get_nav_menu_items($menu_id);
    return  $items ? nav_menu_walker($items, 0, $toggles, 1) : null;
}