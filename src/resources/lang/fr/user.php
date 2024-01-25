<?php

return [
    'title' => 'SeAT-HR Profile',
    'sub-title' => 'Profile',
    'create' => [
        'title' => 'TO DO',
        'sub-title' => 'TO DO',
    ],
    'applications' => [
        'apply' => 'Apply to Corporation',
        'apply_short' => 'Apply',
        'view' => 'View Application',
        'submit' => 'Submit Application',
        'pending' => 'Pending',
        'no_corp_recruiting' => 'No corporations are currently recruiting.',
        'columns' => [
            'id' => 'Id',
            'corporation' => 'Corporation',
            'status' => 'Status',
            'can_reapply' => 'Can Re-apply',
            'submitted_at' => 'Submitted At'
        ],
        'application' => [
            'title' => 'Application: :application_id',
            'columns' => [
                'status' => 'Status',
                'status_by' => 'Status By',
                'can_reapply' => 'Can Reapply ?',
                'created_at' => 'Created At',
                'last_updated' => 'Last Updated',
                'app_id' => 'App ID',
                'profile' => 'Profile'
            ]
        ],
        'reapply' => [
            'yes' => 'Yes',
            'no' => 'No'
        ],
        'answers' => [
            'title' => 'Answers',
            'columns' => [
                'question' => 'Question',
                'response' => 'Response'
            ],
            'boolean' => [
                'yes' => 'Yes',
                'no' => 'No'
            ]
        ]
    ],

    'blacklist' => [
        'title' => 'Blacklist',
        'create' => [
            'sub-title' => 'New blacklist record'
        ],
        'edit' => [
            'sub-title' => 'Edit blacklist record'
        ],
        'delete' => [
            'sub-title' => 'Delete blacklist record'
        ],
        'columns' => [
            'id' => 'Id',
            'blacklisted_by' => 'Blacklisted By',
            'blacklisted_at' => 'Blacklisted At',
            'reason' => 'Reason'
        ]
    ],

    'kick_history' => [
        'title' => 'Kick History',
        'create' => [
            'sub-title' => 'New kick history record'
        ],
        'edit' => [
            'sub-title' => 'Edit kick history record'
        ],
        'delete' => [
            'sub-title' => 'Delete kick history record'
        ],
        'columns' => [
            'id' => 'Id',
            'kicked_by' => 'Kicked By',
            'kicked_at' => 'Kicked At',
            'reason' => 'Reason'
        ]
    ],

    'notes' => [
        'title' => 'Notes',
        'create' => [
            'sub-title' => 'New note'
        ],
        'edit' => [
            'sub-title' => 'Edit note'
        ],
        'delete' => [
            'sub-title' => 'Delete user note'
        ]
    ],

    'roles_header' => 'Roles',
    'role_header' => 'Role',
    'description_header' => 'Description',

    'notes_id_header' => 'Id',
    'notes_severity_header' => 'Severity',
    'notes_note_header' => 'Note',

    'severity_level_info' => 'Info',
    'severity_level_warning' => 'Warning',
    'severity_level_danger' => 'Danger',

];
