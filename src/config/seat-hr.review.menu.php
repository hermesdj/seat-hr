<?php

return [
    [
        'name' => 'seat-hr::hr.review_summary',
        'permission' => 'seat-hr.officer',
        'highlight_view' => 'summary',
        'route' => 'seat-hr.review.summary',
    ],
    [
        'name' => 'seat-hr::hr.review_applications',
        'permission' => 'seat-hr.officer',
        'highlight_view' => 'applications',
        'route' => 'seat-hr.review.applications',
    ],
];
