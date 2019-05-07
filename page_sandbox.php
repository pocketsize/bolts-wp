<?php // Template Name: Sandbox

component('page', [
    'sections' => [
        [
            'component' => 'forms/form',
            'data' => [
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
            ]
        ],
        [
            'component' => 'layouts/layout',
            'data' => [
                'theme' => 'split',
                'modifier' => 'is-fifty-fifty',
                'areas' => [
                    [
                        'modifier' => 'is-primary',
                        'items' => [
                            'component' => 'forms/button',
                            'data' => [
                                'title' => 'I am Button',
                                'url'   => '#'
                            ]
                        ]
                    ],
                    [
                        'modifier' => 'is-secondary',
                        'items' => [
                            [
                                'component' => 'forms/button',
                                'data' => [
                                    'title' => 'I am Button',
                                    'url'   => '#'
                                ]
                            ],
                            [
                                'component' => 'common/link',
                                'data' => [
                                    'title' => 'I am Link',
                                    'url'   => '#'
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ],
        [
            'component' => 'layouts/split',
            'data' => [
                'primary' => [
                    'component' => 'common/image',
                    'data' => [
                        'url'     => 'https://www.placehold.it/1000',
                        'caption' => 'I am caption'
                    ]
                ]
            ]
        ],
        [
            'component' => 'layouts/full',
            'data' => [
                'content' => [
                    'component' => 'common/content',
                    'data' => [
                        'title'   => 'I am title',
                        'content' => get_dummy_content()
                    ]
                ],
            ]
        ]
    ]
]);