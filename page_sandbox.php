<?php // Template Name: Sandbox

get_header();

component('forms/text-input', [
    'title'       => 'I am text input',
    'description' => 'This is my description'
]);

component('forms/select', [
    'title'       => 'I am select',
    'description' => 'This is my description',
    'options'     => [
        [
            'title'       => 'Option 1 (disabled)',
            'value'       => 'one',
            'is_disabled' => true
        ],
        [
            'title'       => 'Option 2 (selected)',
            'value'       => 'two',
            'is_selected' => true
        ],
        [
            'title' => 'Option 3',
            'value' => 'three'
        ]
    ]
]);

component('forms/radio-buttons', [
    'title' => 'I am radio buttons',
    'description' => 'This is my description',
    'options' => [
        [
            'title' => 'Option 1 (disabled)',
            'value' => 'one',
            'is_disabled' => true
        ],
        [
            'title' => 'Option 2 (checked)',
            'value' => 'two',
            'is_checked' => true
        ],
        [
            'title' => 'Option 3',
            'value' => 'three',
        ]
    ]
]);

component('forms/checkboxes', [
    'title' => 'I am checkboxes',
    'description' => 'This is my description',
    'options' => [
        [
            'title' => 'Option 1 (disabled)',
            'value' => 'one',
            'is_disabled' => true
        ],
        [
            'title' => 'Option 2 (checked)',
            'value' => 'two',
            'is_checked' => true
        ],
        [
            'title' => 'Option 3',
            'value' => 'three',
        ]
    ]
]);

component('common/link', [
    'title' => '&nbsp;Linking to post archive&nbsp;',
    'url' => get_post_type_archive_link('post')
]);

component('common/link', [
    'title' => '&nbsp;Linking to cpt archive&nbsp;',
    'url' => get_post_type_archive_link('cpt')
]);

component('common/link', [
    'title' => '&nbsp;Linking to category archive&nbsp;',
    'url' => get_category_link(1)
]);

component('common/link', [
    'title' => '&nbsp;Linking to tag archive&nbsp;',
    'url' => get_category_link(2)
]);

component('common/link', [
    'title' => '&nbsp;Linking to authors posts archive&nbsp;',
    'url' => get_the_author_link(1)
]);

component('common/link', [
    'title' => '&nbsp;Linking to authors posts archive&nbsp;',
    'url' => get_author_posts_url(1)
]);

get_footer();
