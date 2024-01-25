<?php

return [
    'title' => 'SeAT-HR Setup: Questions',
    'sub-title' => 'Questions',
    'create' => [
        'title' => 'Create New Question',
        'sub-title' => 'New Question',
    ],
    'edit' => [
        'title' => 'Edit Question',
        'sub-title' => 'Existing Question'
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
        'question' => 'Question',
        'data_type' => 'Data Type',
        'enabled' => 'Enabled?',
    ],
    'data_types' => [
        'boolean' => 'Boolean',
        'date' => 'Date',
        'datetime' => 'DateTime',
        'string' => 'String',
        'text' => 'Text'
    ]

];
