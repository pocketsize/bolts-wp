<?php

/**
 * Get wp_head()
 */

function get_wp_head() {
    ob_start();
    wp_head();
    return ob_get_clean();
}

/**
 * Get wp_footer()
 */

function get_wp_footer() {
    ob_start();
    wp_footer();
    return ob_get_clean();
}

/**
 * Get header data
 */

function get_header_data() {
    return [
        'menu' => [
            'modifiers' => 'is-level-0',
            'items' => get_nav_menu_array('main', true)
        ],
        'home_url'  => home_url(),
        'site_name' => get_bloginfo('name')
    ];
}

/**
 * Get footer data
 */

function get_footer_data()
{
    return [
        'content' => 'Footer content'
    ];
}

function page($data) {
    $header = get_header_data();
    $footer = get_footer_data();

    $defaults = [
        'attributes' => [
            'lang' => get_bloginfo('language')
        ],
        'charset'   => get_bloginfo('charset'),
        'wp_head'   => get_wp_head(),
        'header'    => $header,
        'footer'    => $footer,
        'wp_footer' => get_wp_footer()
    ];

    $data = array_replace_recursive($defaults, $data);

    component('page', $data);
}

/**
 * Get fallback image
 */

function get_fallback_image()
{
    return 'http://placehold.it/640x480?text=placeholder';
}

/**
 * Convert media id to complete set of image component data
 */

function format_image($image, $args = [], $size = false)
{
    if (is_int($image)) {
        $image = [
            'url' => get_media($image, $size)
        ];
    } else if (!is_array($image)) {
        return false;
    }

    return array_replace_recursive($image, $args);
}

/**
 * Convert acf link field data to complete set of link component data
 */

function format_link($link, $args = [])
{
    if (empty($link)) return false;

    $link['content'] = $link['title'];
    array_diff_key($link, array_flip(['title']));

    return array_replace_recursive($link, $args);
}

/**
 * Format acf flexible content field to set of page component section data
 */

function format_section($section) {
    if (empty($section)) return false;

    $type = $section['acf_fc_layout'];
    $data = array_diff_key($section, array_flip(['acf_fc_layout']));

    switch ($type) {
        case 'text':
            $component = 'common/content';

            break;

        case 'image':
            $component = 'common/image';

            if (!empty($data['image'])) {
                $data = format_image($data['image']);
            }

        // add and edit cases to correspont to your configured page builder types

            break;
    }

    return [
        'component' => $component,
        'data'      => $data
    ];
}

/**
 * Getting data from ACF page builder
 */

function get_page_builder_sections()
{
    $sections = get_field('sections');

    if (empty($sections)) return false;

    $items = [];

    foreach ($sections as $section) {
        $items[] = format_section($section);
    }

    return $items;
}

/**
 * Format radio button
 */

function format_radio_button($content = false, $input_attributes = []) {
    $args = [];

    if (!empty($input_attributes)) {
        $args['input'] = [
            'attributes' => $input_attributes
        ];
    }

    $defaults = [
        'content' => $content,
    ];

    return [
        'component' => 'forms/radio-button',
        'data' => array_replace_recursive($defaults, $args)
    ];
}

/**
 * Format checkbox
 */

function format_checkbox($content = false, $input_attributes = []) {
    $args = [];

    if (!empty($input_attributes)) {
        $args['input'] = [
            'attributes' => $input_attributes
        ];
    }

    $defaults = [
        'content' => $content,
    ];

    return [
        'component' => 'forms/checkbox',
        'data' => array_replace_recursive($defaults, $args)
    ];
}

/**
 * Format social icon
 */

function format_social_icon($url, $icon, $args = [])
{
    $modifiers = [
        'is-' . $icon
    ];

    $defaults = [
        'theme' => 'social-icon',
        'modifiers' => $modifiers,
        'url' => $url,
        'attributes' => [
            'target' => '_blank'
        ]
    ];

    $data = array_replace_recursive($defaults, $args);

    return [
        'component' => 'common/link',
        'data' => $data
    ];
}

/**
 * Get social icons
 */

function get_social_icons($icons = false)
{
    $items = [];

    $social_icons = !empty($icons) ? $icons : get_field('social_icons', 'option');

    if (!empty($social_icons)) {
        foreach ($social_icons as $social_icon) {
            $modifiers = [
                'is-' . $social_icon['icon']
            ];

            $items[] = format_social_icon(
                $social_icon['url'],
                $social_icon['icon']
            );
        }
    }

    return $items;
}

/**
 * Get share icons
 */

function get_share_icons($url = false, $title = false)
{
    $items = [];

    $url = !empty($url) ? $url : $get_permalink();
    $title = !empty($title) ? $title : get_title();

    $share_icons = [
        [
            'icon' => 'facebook',
            'url' => 'https://www.facebook.com/sharer.php?u=' . urlencode($url)
        ],
        [
            'icon' => 'twitter',
            'url' => 'https://twitter.com/share?url=' . urlencode($url) . '&text=' . $title
        ],
        [
            'icon' => 'linkedin',
            'url' => 'https://www.linkedin.com/shareArticle?url=' . urlencode($url) . '&title=' . $title
        ]
    ];

    foreach ($share_icons as $share_icon) {
        $items[] = format_social_icon(
            $share_icon['url'],
            $share_icon['icon'],
            [
                'attributes' => [
                    'data-bolts-action' => 'popup'
                ]
            ]
        );
    }

    return $items;
}

/**
 * Get pagination links
 */

function get_pagination_links() {
    global $paged, $wp_query;

    if (is_single()) {
        $previous_post = get_adjacent_post(false, '', false);
        $next_post     = get_adjacent_post(false, '', true);

        $previous = !empty($previous_post) ? get_permalink($previous_post->ID) : false;
        $next     = !empty($next_post)     ? get_permalink($next_post->ID)     : false;

        $previous_title = 'Föregående inlägg';
        $next_title     = 'Nästa inlägg';
    } else {
        $paged     = $paged ?: 1;
        $max_page  = $wp_query->max_num_pages;
        $next_page = intval($paged) + 1;

        $previous = $paged > 1              ? get_previous_posts_page_link() : false;
        $next     = $next_page <= $max_page ? get_next_posts_page_link()     : false;

        $previous_title = 'Föregående sida';
        $next_title     = 'Nästa sida';
    }

    $links = [];

    if (!empty($previous)) {
        $links[] = [
            'modifier' => 'is-previous',
            'component' => 'common/link',
            'data' => [
                'modifier' => 'has-arrow-left',
                'title'    => $previous_title,
                'url'      => $previous
            ]
        ];
    }

    if (!empty($next)) {
        $links[] = [
            'modifier' => 'is-next',
            'component' => 'common/link',
            'data' => [
                'modifier' => 'has-arrow-right',
                'title'    => $next_title,
                'url'      => $next
            ]
        ];
    }

    return $links;
}