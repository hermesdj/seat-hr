<?php

return [
    'seat-hr' => [
        'name' => 'Human Resources',
        'label' => 'seat-hr::hr.menu_title',
        'icon' => 'fas fa-handshake',
        'route_segment' => 'seat-hr',
        'entries' => [
            [
                'name' => 'Profile',
                'label' => 'seat-hr::hr.menu_profile',
                'icon' => 'fas fa-id-badge',
                'route' => 'seat-hr.profile',
            ],
            [
                'name' => 'Review',
                'label' => 'seat-hr::hr.menu_review',
                'icon' => 'fab fa-black-tie',
                'route' => 'seat-hr.review.index',
                'permission' => [
                    'seat-hr.admin',
                    'seat-hr.officer',
                ],
            ],
            [
                'name' => 'setup',
                'label' => 'seat-hr::hr.menu_setup',
                'icon' => 'fas fa-cog',
                'plural' => true,
                'route' => 'seat-hr.config.corp.view',
                'permission' => 'seat-hr.admin',
                'entries' => [
                    [
                        'name' => 'Corporation',
                        'label' => 'seat-hr::hr.menu_setup_corp',
                        'icon' => 'fas fa-building',
                        'permission' => 'superuser',
                        'route' => 'seat-hr.config.corp.view'
                    ],
                    [
                        'name' => 'Questions',
                        'label' => 'seat-hr::hr.menu_setup_questions',
                        'icon' => 'fas fa-cog',
                        'route' => 'seat-hr.config.question.view'
                    ],
                ]
            ],
            [
                'name' => 'About',
                'label' => 'seat-hr::hr.menu_about',
                'icon' => 'fas fa-info',
                'route' => 'seat-hr.about'
            ],
        ],
    ],
];
