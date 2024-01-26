<?php

return [
    'seat_hr_new_application_notification' => [
        'label' => 'seat-hr::notifications.seat_hr_new_application_notification',
        'handlers' => [
            'discord' => \Cryocaustik\SeatHr\Notifications\Discord\NewApplicationDiscordNotification::class
        ]
    ]
];
