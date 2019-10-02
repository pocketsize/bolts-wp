<?php

/**
 * Template Name: Sandbox
 */

page([
    'sections' => [
        [
            'component' => 'common/layout',
            'data' => [
                'modifiers' => 'is-contained',
                'items' => [
                    [
                        'component' => 'common/tabs',
                        'data' => [
                            'items' => [
                                [
                                    'label' => 'Number One',
                                    'items' => [
                                        'component' => 'common/content',
                                        'data' => [
                                            'title' => 'Title for Number One',
                                            'content' => 'Content for Number One'
                                        ]
                                    ]
                                ],
                                [
                                    'label' => 'Number Two',
                                    'items' => [
                                        'component' => 'common/content',
                                        'data' => [
                                            'title' => 'Title for Number Two',
                                            'content' => 'Content for Number Two'
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ],
        [
            'component' => 'common/layout',
            'data' => [
                'modifiers' => 'is-contained',
                'items' => [
                    [
                        'component' => 'common/accordion',
                        'data' => [
                            'items' => [
                                [
                                    'title' => 'Hello errbody',
                                    'content' => 'This is what it says in the content'
                                ],
                                [
                                    'title' => 'And like it or not',
                                    'content' => 'There\'s more where that came from'
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ],

        [
            'component' => 'common/layout',
            'data' => [
                'modifiers' => 'is-contained',
                'items' => [
                    [
                        'component' => 'common/slider',
                        'data' => [
                            'arrows' => true,
                            'dots' => true,
                            'items' => [
                                [
                                    'component' => 'common/image',
                                    'data' => [
                                        'url' => 'http://placehold.it/900x450?text=Number+One'
                                    ]
                                ],
                                [
                                    'component' => 'common/image',
                                    'data' => [
                                        'url' => 'http://placehold.it/900x450?text=Number+Two'
                                    ]

                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ],

        [
            'component' => 'common/layout',
            'data' => [
                'modifiers' => 'is-contained',
                'items' => [
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
                                    'component' => 'forms/fieldset',
                                    'data' => [
                                        'title' => 'I am radio buttons',
                                        'description' => 'This is my description',
                                        'items' => [
                                            format_radio_button('Option 1 (disabled)', [
                                                'name' => 'radio',
                                                'value' => 'one',
                                                'disabled' => true
                                            ]),
                                            format_radio_button('Option 2 (checked)', [
                                                'name' => 'radio',
                                                'value' => 'two',
                                                'checked' => true
                                            ]),
                                            format_radio_button('Option 3', [
                                                'name' => 'radio',
                                                'value' => 'three',
                                            ]),
                                            format_radio_button('Option 4', [
                                                'name' => 'radio',
                                                'value' => 'four',
                                            ])
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
                                                'content' => 'Option 1 (disabled)',
                                                'attributes' => [
                                                    'value' => 'one',
                                                    'disabled' => true
                                                ]
                                            ],
                                            [
                                                'content' => 'Option 2 (selected)',
                                                'attributes' => [
                                                    'value' => 'two',
                                                    'selected' => true
                                                ]
                                            ],
                                            [
                                                'content' => 'Option 3',
                                                'attributes' => [
                                                    'value' => 'three'
                                                ]
                                            ],
                                            [
                                                'content' => 'Option 4',
                                                'attributes' => [
                                                    'value' => 'four'
                                                ]
                                            ]
                                        ]
                                    ]
                                ],
                                [
                                    'component' => 'forms/fieldset',
                                    'data' => [
                                        'title' => 'I am checkboxes',
                                        'description' => 'This is my description',
                                        'items' => [
                                            format_checkbox('Option 1 (disabled)', [
                                                'name' => 'check',
                                                'value' => 'one',
                                                'disabled' => true
                                            ]),
                                            format_checkbox('Option 2 (checked)', [
                                                'name' => 'check',
                                                'value' => 'two',
                                                'checked' => true
                                            ]),
                                            format_checkbox('Option 3', [
                                                'name' => 'check',
                                                'value' => 'three',
                                            ]),
                                            format_checkbox('Option 4', [
                                                'name' => 'check',
                                                'value' => 'four',
                                            ])
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
                                        'content' => 'I am Button',
                                        'url'   => '#'
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ],
        [
            'component' => 'common/layout',
            'data' => [
                'theme' => 'split',
                'modifiers' => [
                    'is-fifty-fifty',
                    'is-contained'
                ],
                'areas' => [
                    [
                        'modifiers' => 'is-primary',
                        'items' => [
                            'component' => 'forms/button',
                            'data' => [
                                'content' => 'I am Button',
                                'url'   => '#'
                            ]
                        ]
                    ],
                    [
                        'modifiers' => 'is-secondary',
                        'items' => [
                            [
                                'component' => 'forms/button',
                                'data' => [
                                    'content' => 'I am Button',
                                    'url'   => '#'
                                ]
                            ],
                            [
                                'component' => 'common/link',
                                'data' => [
                                    'content' => 'I am Link',
                                    'url'   => '#'
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ],
        [
            'component' => 'common/layout',
            'data' => [
                'modifiers' => 'is-contained',
                'items' => [
                    [
                        'component' => 'common/image',
                        'data' => [
                            'url'     => 'https://www.placehold.it/1000',
                            'caption' => 'I am caption'
                        ]
                    ],
                    [
                        'component' => 'common/content',
                        'data' => [
                            'title'   => 'Title',
                            'lead'    => '<p>Lead paragraph</p>',
                            'content' => '<p>Content</p>'
                        ]
                    ]
                ]
            ]
        ],
        [
            'component' => 'common/layout',
            'data' => [
                'modifiers' => 'is-contained',
                'items' => [
                    [
                        'component' => 'common/content',
                        'data' => [
                            'title'   => 'I am title',
                            'content' => get_dummy_content()
                        ]
                    ]
                ],
            ]
        ]
    ]
]);
