<?php

/**
 * Construct a nav menu as a nested array of menu objects
 * @param array $elements
 * @param int $parent_id
 * @return array
 */

if (!function_exists('bolts_build_nav_menu_tree')) {
    function bolts_build_nav_menu_tree(&$elements, $parent_id = 0)
    {
        global $post;

        $branch = [];

        foreach ($elements as &$element) {
            $element->current_menu_item = false;

            if (isset($post) && $element->object_id == $post->ID) {
                $element->current_menu_item = true;
            }

            if ($element->menu_item_parent == $parent_id) {
                $children = bolts_build_nav_menu_tree($elements, $element->ID);

                $element->children = false;
                if ($children) {
                    $element->children = $children;
                }

                $branch[$element->ID] = $element;
                unset($element);
            }
        }

        return $branch;
    }
}

/**
 * Return a nested nav menu array by menu location
 * @param string $location
 * @return array|null
 */

if (!function_exists('get_menu_object')) {
    function get_menu_object($location = false)
    {
        /* TODO: fail more gracefully if menu at specified location is not defined */
        global $post;

        if (!$location) {
            $location = BOLTS_WP_DEFAULT_MENU_LOCATION;
        }

        $locations = get_nav_menu_locations();
        
        if (empty($locations) || !isset($locations[ $location ])) {
            return null;
        }

        $menu_id = $locations[ $location ];

        $menu_items = wp_get_nav_menu_items($menu_id);

        return $menu_items ? bolts_build_nav_menu_tree($menu_items, 0) : null;
    }
}
