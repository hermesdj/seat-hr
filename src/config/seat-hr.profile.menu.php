<?php

return [
    [
        'name' => 'seat-hr::hr.profile_menu_applications',
        'permission' => 'character.sheet',
        'highlight_view' => 'applications',
        'route' => 'seat-hr.profile.applications',
    ],
    [
        'name' => 'seat-hr::hr.profile_menu_blacklist',
        'permission' => 'seat-hr.officer',
        'highlight_view' => 'blacklist',
        'route' => 'seat-hr.profile.blacklist',
    ],
    [
        'name' => 'seat-hr::hr.profile_menu_intel',
        'permission' => 'seat-hr.officer',
        'highlight_view' => 'intel',
        'route' => 'seat-hr.profile.intel',
    ],
    [
        'name' => 'seat-hr::hr.profile_menu_kick_history',
        'permission' => 'seat-hr.officer',
        'highlight_view' => 'kickhistory',
        'route' => 'seat-hr.profile.kickhistory',
    ],
    [
        'name' => 'seat-hr::hr.profile_menu_notes',
        'permission' => 'seat-hr.officer',
        'highlight_view' => 'note',
        'route' => 'seat-hr.profile.note',
    ],
    [
        'name' => 'seat-hr::hr.profile_menu_sheet',
        'permission' => 'character.sheet',
        'highlight_view' => 'sheet',
        'route' => 'seat-hr.profile.sheet',
    ],
    [
        'name' => 'seat-hr::hr.profile_menu_seat_profile',
        'permission' => 'character.sheet',
        'highlight_view' => 'SeAT Profile',
        'route' => 'seatcore::character.view.sheet',
    ],
];
