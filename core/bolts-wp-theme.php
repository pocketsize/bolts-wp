<?php

/**
 * Bolts WP v1.0 | MIT License
 *
 * Developed by Pocketsize
 * http://www.pocketsize.se/
 */

/**
 * Include a template part from the components folder, with optional arguments
 * @param string $file
 * @param array $args
 * @return string
 */

if (!function_exists('component')) {
    function component($file, $args = false)
    {
        $path = get_theme_dir() . '/components/' . $file . '.php';

        global $posts, $post, $wp_did_header, $wp_query, $wp_rewrite,
               $wpdb, $wp_version, $wp, $id, $comment, $user_ID;

        if (is_array($wp_query->query_vars)) {
            extract($wp_query->query_vars, EXTR_SKIP);
        }
        if (isset($s)) {
            $s = esc_attr($s);
        }

        if (is_array($args)) {
            extract($args);
        }

        require $path;
    }
}

/**
 * Return the current theme directory
 * TODO: Add support for child themes
 * @return string
 */

if (!function_exists('get_theme_dir')) {
    function get_theme_dir()
    {
        return get_template_directory();
    }
}

/**
 * Return the current theme directory URI
 * TODO: Add support for child themes
 * @return string
 */

if (!function_exists('get_theme_uri')) {
    function get_theme_uri()
    {
        return get_template_directory_uri();
    }
}

/**
 * Return the path to a theme asset file
 * @param string $asset
 * @param string $fallback
 * @return string
 */

if (!function_exists('get_asset')) {
    function get_asset($asset, $fallback = false)
    {
        $path = get_theme_dir() . '/public/' . $asset;

        if (file_exists($path)) {
            return get_theme_uri() . '/public/' . $asset . '?m=' . filemtime($path);
        }

        return $fallback;
    }
}

/**
 * Return .svg file parsed for inline use
 * @param string $asset
 * @param string $fallback
 * @return string
 */

function get_svg($asset, $fallback = false)
{
    $path = get_theme_dir() . '/public/images/' . $asset . '.svg';

    if (!file_exists($path) && $fallback) {
        $path = $fallback;
    }

    if (!file_exists($path)) {
        throw new Exception('Asset not found: ' . $path);
    }

    $inline = preg_replace('/\s*<\?xml.*?\?>\s*/si', '', file_get_contents($path));
    $inline = preg_replace('/\s*<!--.*?-->\s*/si', '', $inline);
    $inline = preg_replace('/\s*<title>.*?<\/title>\s*/si', '', $inline);
    $inline = preg_replace('/\s*<desc>.*?<\/desc>\s*/si', '', $inline);

    return $inline;
}

/**
 * Loop through the layout items and output components from their data,
 * if a class and a class suffix is present wrap the component in a div.
 * @param array|string $items - loops over items or just outputs string
 * @param string $item_class
 * @return string
 */

if (!function_exists('layout_items')) {
    function layout_items($items, $item_class = false)
    {
        if (empty($items)) {
            return false;
        }

        if (array_keys($items) !== range(0, count($items) - 1)) {
            layout_item($items);
        } else {
            foreach ($items as $item) {
                $modifier = !empty($item['modifier']) ? $item['modifier'] : '';

                echo !empty($item_class) ? '<div class="' . $item_class . ' ' . $modifier . '">' : '';

                layout_item($item);

                echo !empty($item_class) ? '</div>' : '';
            }
        }
    }
}

/**
 * Outputs string or component
 * @param array|string $items - loops over items or just outputs string
 * @return string
 */

if (!function_exists('layout_item')) {
    function layout_item($item)
    {
        if (is_string($item)) {
            echo $item;
        } else {
            component($item['component'], $item['data']);
        }
    }
}

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
