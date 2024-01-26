<?php

namespace Cryocaustik\SeatHr\Notifications\Discord;

use Cryocaustik\SeatHr\Helpers\NotificationHelper;
use Cryocaustik\SeatHr\models\SeatHrApplication;
use Seat\Notifications\Notifications\AbstractDiscordNotification;
use Seat\Notifications\Services\Discord\Messages\DiscordMessage;

class NewApplicationDiscordNotification extends AbstractDiscordNotification
{
    private int $application_id;

    public function __construct($application_id)
    {
        $this->application_id = $application_id;
    }

    protected function populateMessage(DiscordMessage $message, $notifiable): void
    {
        $application = SeatHrApplication::find($this->application_id);

        if (!is_null($application)) {
            $message
                ->success()
                ->from('Seat HR')
                ->content(trans('seat-hr::notifications.seat_hr_new_application_notification'))
                ->embed(NotificationHelper::buildDiscordHrApplicationEmbed($application));
        }
    }
}
