<?php // Template Name: Sandbox

get_header();

dump('Form components in split layout');

component('forms/form', [
    'action' => '',
    'fields' => [
        [
            'component' => 'forms/text-input',
            'data' => [
                'title'       => 'I am text input',
                'description' => 'This is my description'
            ]
        ],
        [
            'component' => 'forms/radio-buttons',
            'data' => [
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
                    ],
                    [
                        'title' => 'Option 4',
                        'value' => 'four',
                    ]
                ]
            ]
        ],
        [
            'component' => 'forms/select',
            'data' => [
                'title'       => 'I am select',
                'description' => 'You can also use choices by initializing "src/js/external/choices.js"',
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
                    ],
                    [
                        'title' => 'Option 4',
                        'value' => 'four'
                    ]
                ]
            ]
        ],
        [
            'component' => 'forms/checkboxes',
            'data' => [
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
                    ],
                    [
                        'title' => 'Option 4',
                        'value' => 'four',
                    ]
                ]
            ]
        ],
        [
            'component' => 'forms/textarea',
            'data' => [
                'title'       => 'I am textarea',
                'description' => 'This my description'
            ]
        ],
        [
            'component' => 'forms/button',
            'data' => [
                'title' => 'I am Button',
                'url'   => '#'
            ]
        ]
    ]
]);

dump('Button and link in split layout');

component('layouts/split', [
    'primary' => [
        'component' => 'common/button',
        'data' => [
            'title' => 'I am Button',
            'url'   => '#'
        ]
    ],
    'secondary' => [
        'component' => 'common/link',
        'data' => [
            'title' => 'I am Link',
            'url'   => '#'
        ]
    ],
]);

dump('Captioned image split layout');

component('layouts/split', [
    'primary' => [
        'component' => 'common/image',
        'data' => [
            'url'     => 'https://www.placehold.it/1000',
            'caption' => 'I am caption'
        ]
    ]
]);

dump('Content component in full layout');

component('layouts/full', [
    'content' => [
        'component' => 'common/content',
        'data' => [
            'title'   => 'I am title',
            'content' => get_dummy_content()
        ]
    ],
]);

get_footer();
