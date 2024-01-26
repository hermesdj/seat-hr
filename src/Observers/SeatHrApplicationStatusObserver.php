<?php

namespace Cryocaustik\SeatHr\Observers;

use Cryocaustik\SeatHr\models\SeatHrApplicationStatus;
use Seat\Notifications\Models\NotificationGroup;
use Seat\Notifications\Traits\NotificationDispatchTool;

class SeatHrApplicationStatusObserver
{
    use NotificationDispatchTool;

    public function created(SeatHrApplicationStatus $status): void
    {
        $this->dispatch('seat_hr_new_application_notification', $status->application_id);
    }

    private function dispatch($alertType, $data): void
    {
        $groups = NotificationGroup::with('alerts')
            ->whereHas('alerts', function ($query) use ($alertType): void {
                $query->where('alert', $alertType);
            })->get();

        $this->dispatchNotifications($alertType, $groups, function ($constructor) use ($data) {
            return new $constructor($data);
        });
    }
}
