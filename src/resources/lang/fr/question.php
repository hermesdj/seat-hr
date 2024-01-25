<?php

return [
    'title' => 'Installation de SeAT-HR : Questions',
    'sub-title' => 'Questions',
    'create' => [
        'title' => 'Créer une nouvelle question',
        'sub-title' => 'Nouvelle Question',
    ],
    'edit' => [
        'title' => 'Modifier une Question',
        'sub-title' => 'Question existante'
    ],
    'delete' => [
        'warning' => 'DANGER: La suppression d\'une question supprimera toutes les réponses historiques pour la question!
            \nCela entraînera également la suppression de cette question/réponse dans les candidatures existantes, ce qui pourrait conduire à des candidatures vides..
            \nVous devez plutôt utiliser l\'option de désactivation pour conserver les réponses mais empêcher les soumissions futures..
            \n\nÊtes-vous sur de vouloir continuer?
        '
    ],
    'unknown_type' => 'Type de question inconnu',
    'fields' => [
        'id' => 'ID',
        'question' => 'Question',
        'data_type' => 'Type de données',
        'enabled' => 'Activé?',
        'active' => 'Actif?',
        'used' => 'Utilisateur?'
    ],
    'data_types' => [
        'boolean' => 'Booléen',
        'date' => 'Date',
        'datetime' => 'DateHeure',
        'string' => 'Chaîne',
        'text' => 'Texte'
    ]

];
