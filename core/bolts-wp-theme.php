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
        return false;
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
 * @param string $item_tag
 * @return string
 */

if (!function_exists('layout_items')) {
    function layout_items($items, $item_class = false, $item_tag = 'div')
    {
        if (empty($items)) {
            return false;
        }

        if (array_keys($items) !== range(0, count($items) - 1)) {
            layout_item($items, $item_class, $item_tag);
        } else {
            foreach ($items as $item) {
                layout_item($item, $item_class, $item_tag);
            }
        }
    }
}

/**
 * Outputs string or component
 * @param array|string $items - loops over items or just outputs string
 * @param string $item_class
 * @param string $item_tag
 * @return string
 */

if (!function_exists('layout_item')) {
    function layout_item($item, $item_class = false, $item_tag = 'div')
    {
        $modifiers  = modifiers($item['modifiers'] ?? null, false);
        $attributes = attributes($item['attributes'] ?? '');

        echo !empty($item_class) ? '<' . $item_tag . ' class="' . $item_class . ' ' . $modifiers . '" ' . $attributes . '>' : '';

        if (is_string($item)) {
            echo $item;
        } else {
            if (!empty($item['component']) && !empty($item['data'])) {
                component($item['component'], $item['data']);
            } elseif (!empty($item['content'])) {
                echo $item['content'];
            }
        }

        echo !empty($item_class) ? '</' . $item_tag . '>' : '';
    }
}