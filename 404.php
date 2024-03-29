<?php

$post_id = false;

if (function_exists('get_field')) {
    $post_id = get_field('404_page', 'option');
}

if ($post_id) {
    global $post;

    // Get 404 page post object
    $post_object = get_post($post_id);

    // Get 404 page template
    $template = get_page_template_slug($post_id);

    // If template is default template, use page.php
    $template = $template != '' ? $template : 'page.php';

    // Set $post variable to 404 page post object
    $post = $post_object;

    // Set up 404 page post data
    setup_postdata($post);

    // Set $template_path
    $template_path = get_theme_dir() . '/' . $template;

    // Use page template if it exists, otherwise use index.php
    $template_path = file_exists($template_path) ? $template_path : get_theme_dir() . '/index.php';

    // Include 404 page post template
    include($template_path);

    die();
} else {
    component('page', [
        'sections' => [
            'component' => 'common/content',
            'data' => [
                'title'   => '404',
                'content' => '<p>We could not find what you were looking for</p>'
            ]
        ]
    ]);
}
