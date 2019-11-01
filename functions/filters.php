<?php

/**
 * Set default image sizes
 */

function bolts_wp_set_image_sizes($sizes)
{
    return [
        'small'  => [
            'width'  => 640,
            'height' => 640,
            'crop'   => false
        ],
        'medium' => [
            'width'  => 1280,
            'height' => 1280,
            'crop'   => false
        ],
        'large'  => [
            'width'  => 1920,
            'height' => 1920,
            'crop'   => false
        ],
        'xlarge' => [
            'width'  => 2560,
            'height' => 2560,
            'crop'   => false
        ]
    ];
}
add_filter('intermediate_image_sizes_advanced', 'bolts_wp_set_image_sizes');

/**
 * Wrap embed elements in a div with a custom class
 */

function bolts_wp_wrap_embed_elements($html)
{
    return '<div class="embed-wrapper">' . $html . '</div>';
}
add_filter('embed_oembed_html', 'bolts_wp_wrap_embed_elements', 10, 3);
add_filter('video_embed_html', 'bolts_wp_wrap_embed_elements');

/**
 * Wrap user entered embed elements in a div with a custom class
 */

function bolts_wp_wrap_user_embed_elements($content)
{
    return preg_replace('~(<iframe.*</iframe>|<embed.*</embed>)~', bolts_wp_wrap_embed_elements('$1'), $content);
}
add_filter('the_content', 'bolts_wp_wrap_user_embed_elements');

/**
 * Add a custom class to all paragraphs containing images
 */

function bolts_wp_add_image_wrapper_class($content)
{
    return preg_replace('/(<p[^>]*)(\>.*)(\s*)(\<img.*)(\s*)(<\/p>)/im', '$1 class="image-wrapper"$2$3$4', $content);
}
add_filter('the_content', 'bolts_wp_add_image_wrapper_class', 20);
