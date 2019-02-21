<?php
    /**
     * Single archive template
     *
     * Refrain from using WP's own archive pages if possibe.
     * Create them as pages instead.
     *
     * Page templates that largely share codebase should use
     * templates. As the theme is currently there is only one
     * post type and only one archive page, but as the project
     * grows, so does the need for other post types.
     *
     * Check out ./page_archive-post.php for usage
     *
     * @param array $items
     */

get_header();

if ($items) {
    foreach ($items as $item) {
        component('post-preview', $item);
    }
} else {
    component('content', ['content' => 'Det finns ingenting att visa']);
}

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

get_footer();
