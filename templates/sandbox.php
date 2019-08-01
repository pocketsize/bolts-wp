<?php

/**
 * Template Name: Sandbox
 */

component('page', [
    'sections' => [
        [
            'component' => 'common/link',
            'attributes' => [
                'style' => 'position: relative;'
            ],
            'data' => [
                'theme'  => 'overlay',
                'modifiers' => 'is-pretty-cool',
                'content'  => 'Link content',
                'url'    => '#link-url',
                'target' => '_blank',
            ]
        ],
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
        ],
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
        ],
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
        ],
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
                            'type' => 'radio',
                            'name' => 'test',
                            'items' => [
                                [

                                    'content' => 'Option 1 (disabled)',
                                    'input' => [
                                        'attributes' => [
                                            'value' => 'one',
                                            'disabled' => true
                                        ]
                                    ]
                                ],
                                [

                                    'content' => 'Option 2 (checked)',
                                    'input' => [
                                        'attributes' => [
                                            'value' => 'two',
                                            'checked' => true
                                        ]
                                    ]
                                ],
                                [

                                    'content' => 'Option 3',
                                    'input' => [
                                        'attributes' => [
                                            'value' => 'three',
                                        ]
                                    ]
                                ],
                                [

                                    'content' => 'Option 4',
                                    'input' => [
                                        'attributes' => [
                                            'value' => 'four',
                                        ]
                                    ]
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
                            'type' => 'checkbox', // defaults to checkbox
                            'items' => [
                                [
                                    'content' => 'Option 1 (disabled)',
                                    'input' => [
                                        'attributes' => [
                                            'value' => 'one',
                                            'disabled' => true
                                        ]
                                    ]
                                ],
                                [
                                    'content' => 'Option 2 (checked)',
                                    'input' => [
                                        'attributes' => [
                                            'value' => 'two',
                                            'checked' => true
                                        ]
                                    ]
                                ],
                                [
                                    'content' => 'Option 3',
                                    'input' => [
                                        'attributes' => [
                                            'value' => 'three',
                                        ]
                                    ]
                                ],
                                [
                                    'content' => 'Option 4',
                                    'input' => [
                                        'attributes' => [
                                            'value' => 'four',
                                        ]
                                    ]
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
                            'content' => 'I am Button',
                            'url'   => '#'
                        ]
                    ]
                ]
            ]
        ],
        [
            'component' => 'layouts/flexible',
            'data' => [
                'theme' => 'split',
                'modifiers' => 'is-fifty-fifty',
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
            'component' => 'layouts/split',
            'data' => [
                'primary' => [
                    'component' => 'common/image',
                    'data' => [
                        'url'     => 'https://www.placehold.it/1000',
                        'caption' => 'I am caption'
                    ]
                ],
                'secondary' => [
                    'component' => 'common/content',
                    'data' => [
                        'title'   => 'Title',
                        'lead'    => '<p>Lead paragraph</p>',
                        'content' => '<p>Content</p>'
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