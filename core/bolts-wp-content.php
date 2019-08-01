<?php

/**
 * Bolts WP v1.0.0
 *
 * Developed by Pocketsize
 * http://www.pocketsize.se/
 */

/**
 * Get all pages using a custom template
 * @param string $template
 * @return array|bool
 */

if (!function_exists('get_page_ids_by_template')) {
    function get_page_ids_by_template($template)
    {
        return get_posts([
            'post_type'  => 'page',
            'fields'     => 'ids',
            'nopaging'   => true,
            'meta_key'   => '_wp_page_template',
            'meta_value' => $template . '.php'
        ]);
    }
}

/**
 * Get first page using a custom template
 * @param string $template
 * @return int|bool
 */

if (!function_exists('get_page_id_by_template')) {
    function get_page_id_by_template($template)
    {
        $ids = get_page_ids_by_template($template);

        if (!count($ids)) {
            return false;
        }

        return $ids[0];
    }
}

/**
 * Determine if a page has a specific page template
 * @param string $template
 * @param int $post_id
 * @return bool
 */

if (!function_exists('is_template')) {
    function is_template($template, $post_id = false)
    {
        if (!!$post_id) {
            $post = get_post($post_id);
        } else {
            global $post;
        }

        if (!$post) {
            return false;
        }

        return is_page_template($template . '.php');
    }
}

/**
 * Determine if a post has a specific post type
 * @param string $post_type
 * @param object $post_id
 * @return bool
 */

if (!function_exists('is_post_type')) {
    function is_post_type($post_type, $post_id = false)
    {
        if (!$post) {
            global $post;
        } elseif (is_int($post_id)) {
            $post = get_post($post_id);
        }

        if (!$post) {
            return false;
        }

        return $post->post_type == $post_type;
    }
}

/**
 * Return the title of a post
 * @param int $post_id
 * @param bool $filtered
 * @return string
 */

if (!function_exists('get_title')) {
    function get_title($post_id = false, $filtered = true)
    {
        if (!!$post_id) {
            $post = get_post($post_id);
        } else {
            global $post;
        }

        if ($filtered) {
            return apply_filters('the_title', $post->post_title);
        }

        return $post->post_title;
    }
}

/**
 * Return the content of a post
 * @param int $post_id
 * @param bool $filtered
 * @return string
 */

if (!function_exists('get_content')) {
    function get_content($post_id = false, $filtered = true)
    {
        if (!!$post_id) {
            $post = get_post($post_id);
        } else {
            global $post;
        }

        if ($filtered) {
            return apply_filters('the_content', $post->post_content);
        }

        return $post->post_content;
    }
}

/**
 * Return the excerpt for a post (manual or automatically generated)
 * @param int $post_id
 * @param int $words
 * @param string $more
 * @return string
 */

if (!function_exists('get_excerpt')) {
    function get_excerpt($post_id = false, $words = false, $more = false)
    {
        if (!$words) {
            $words = apply_filters('excerpt_length', 55);
        }

        if (!$more) {
            $more = apply_filters('excerpt_more', '...');
        }

        if (!!$post_id) {
            $post = get_post($post_id);
        } else {
            global $post;
        }
        
        $content = $post->post_content;

        if (!empty($post->post_excerpt)) {
            $content = $post->post_excerpt;
        }

        return apply_filters('the_content', wp_trim_words($content, $words, $more));
    }
}

/**
 * Return author information from a post (defaults to display name)
 * @param int $post_id
 * @param string $field
 * @return string
 */

if (!function_exists('get_author')) {
    function get_author($post_id = false, $field = 'display_name')
    {
        if (!!$post_id) {
            $post = get_post($post_id);
        } else {
            global $post;
        }

        return get_the_author_meta($field, $post->post_author);
    }
}

/**
 * Get post date
 * @param int $post_id
 * @param string $format
 * @return string
 */

if (!function_exists('get_date')) {
    function get_date($post_id = false, $format = false)
    {
        if (!$post_id) {
            global $post;
            $post_id = $post->ID;
        }

        return get_the_date($format, $post_id);
    }
}

/**
 * Return the URI for the featured image of a post
 * @param int $post_id
 * @param string $size
 * @param string $fallback
 * @return string
 */

if (!function_exists('get_featured_image')) {
    function get_featured_image($post_id = false, $size = 'full', $fallback = false)
    {
        if (!$post_id) {
            global $post;
            if (!$post) {
                return $fallback;
            }
            $post_id = $post->ID;
        }
        
        if (has_post_thumbnail($post_id)) {
            $image = wp_get_attachment_image_src(
                get_post_thumbnail_id($post_id),
                $size
            );
            
            if (!empty($image[0])) {
                return $image[0];
            }
        }

        return $fallback;
    }
}

/**
 * Return the path to an attachment in the media library
 * @param int $attachment_id
 * @param string $size
 * @param string $fallback
 * @return string
 */

if (!function_exists('get_media')) {
    function get_media($attachment_id, $size = 'full', $fallback = false)
    {
        $image = wp_get_attachment_image_src($attachment_id, $size);

        if (!!$image) {
            return $image[0];
        }

        return $fallback;
    }
}
