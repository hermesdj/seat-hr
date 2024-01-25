<?php

return [
    'title' => 'Profil SeAT-HR',
    'sub-title' => 'Profil',
    'create' => [
        'title' => 'À faire',
        'sub-title' => 'À faire',
    ],
    'applications' => [
        'apply' => 'Postuler à la Corporation',
        'view' => 'Voir les candidatures',
        'submit' => 'Présenter une Candidature',
        'submit' => 'Soumettre une candidature',
        'pending' => 'En attente',
        'no_corp_recruiting' => 'Aucune corporation ne recrute actuellement.',
        'columns' => [
            'id' => 'Id',
            'corporation' => 'Corporation',
            'status' => 'Statut',
            'can_reapply' => 'Peut recandidater',
            'submitted_at' => 'Soumis à'
        ],
        'application' => [
            'title' => 'Application: :application_id',
            'columns' => [
                'status' => 'Statut',
                'status_by' => 'Statut par',
                'can_reapply' => 'Peut recandidater ?',
                'created_at' => 'Créé à',
                'last_updated' => 'Dernière mise à jour',
                'app_id' => 'App ID',
                'profile' => 'Profil'
            ]
        ],
        'reapply' => [
            'yes' => 'Oui',
            'no' => 'Non'
        ],
        'answers' => [
            'title' => 'Réponses',
            'columns' => [
                'question' => 'Question',
                'response' => 'Response'
            ],
            'boolean' => [
                'yes' => 'Oui',
                'no' => 'Non'
            ]
        ]
    ],

    'blacklist' => [
        'title' => 'Liste noire',
        'create' => [
            'sub-title' => 'Nouvel enregistrement sur la liste noire'
        ],
        'edit' => [
            'sub-title' => 'Modifier l\'enregisrement de la liste noire'
        ],
        'delete' => [
            'sub-title' => 'Supprimer l\'enregistrement de la liste noire'
        ],
        'columns' => [
            'id' => 'Id',
            'blacklisted_by' => 'Sur liste noire par',
            'blacklisted_at' => 'Sur liste noire à',
            'reason' => 'Reason'
        ]
    ],

    'kick_history' => [
        'title' => 'Historique des kicks',
        'create' => [
            'sub-title' => 'Nouvel enregistrement de l\'historique des kicks'
        ],
        'edit' => [
            'sub-title' => 'Editer l\'enregistrement de l\'historique des kicks'
        ],
        'delete' => [
            'sub-title' => 'Supprimer l\'historique des kicks'
        ],
        'columns' => [
            'id' => 'Id',
            'kicked_by' => 'Kické par',
            'kicked_at' => 'Kické à',
            'reason' => 'Raison'
        ]
    ],

    'notes' => [
        'title' => 'Notes',
        'create' => [
            'sub-title' => 'Nouvelle note'
        ],
        'edit' => [
            'sub-title' => 'Editer une note'
        ],
        'delete' => [
            'sub-title' => 'Supprimer une note'
        ]
    ],

    'roles_header' => 'Roles',
    'role_header' => 'Role',
    'description_header' => 'Description',

    'notes_id_header' => 'Id',
    'notes_severity_header' => 'Sévérité',
    'notes_note_header' => 'Note',

    'severity_level_info' => 'Info',
    'severity_level_warning' => 'Avertissement',
    'severity_level_danger' => 'Danger',

];
