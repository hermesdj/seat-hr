<?php

namespace Cryocaustik\SeatHr\Helpers;

use Cryocaustik\SeatHr\models\SeatHrApplication;
use Seat\Notifications\Services\Discord\Messages\DiscordEmbed;
use Seat\Notifications\Services\Discord\Messages\DiscordEmbedField;

class NotificationHelper
{
    public static function buildDiscordHrApplicationEmbed(SeatHrApplication $application): \Closure
    {
        $url = route('seat-hr.review.applications', [
            'corporation' => $application->corporation->id
        ]);

        return function (DiscordEmbed $embed) use ($application, $url): void {
            $embed
                ->title(trans('seat-hr::notifications.new_application.title', ['corp' => $application->corporation->name]), $url)
                ->author($application->profile->user->name, "https://images.evetech.net/characters/" . $application->profile->user->main_character_id . "/portrait");

            foreach ($application->answers as $answer) {
                $embed->field(function (DiscordEmbedField $field) use ($answer) {
                    $field->name($answer->question->name)
                        ->value($answer->response)
                        ->long();
                });
            }
        };
    }
}
