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
        'warning' => 'DANGER: Deleting a question will delete all historical answers for the question!
            \nThis will also lead to existing applications having this question/answer deleted, potentially leading to blank applications.
            \nYou should use the deactivate option instead to keep answers but prevent future submissions.
            \n\nAre you sure you want to proceed?
        '
    ],
    'unknown_type' => 'Unknown question type',
    'fields' => [
        'id' => 'ID',
        'question' => 'Question',
        'data_type' => 'Data Type',
        'enabled' => 'Enabled?',
        'active' => 'Active?',
        'used' => 'User?'
    ],
    'data_types' => [
        'boolean' => 'Boolean',
        'date' => 'Date',
        'datetime' => 'DateTime',
        'string' => 'String',
        'text' => 'Text'
    ]

];
