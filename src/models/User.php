<?php

namespace Cryocaustik\SeatHr\models;

use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use \Seat\Web\models\User as SeatUser;


class User extends SeatUser
{
    protected $table = 'users';

    public function profile(): HasOne
    {
        return $this->hasOne(SeatHrProfile::class, 'user_id', 'id');
    }

    public function applications(): HasManyThrough
    {
        return $this->hasManyThrough(SeatHrApplication::class, SeatHrProfile::class, 'user_id', 'profile_id', 'id', 'id')
            ->with('status');
    }

    public function kickHistory(): HasManyThrough
    {
        return $this->hasManyThrough(SeatHrKickHistory::class, SeatHrProfile::class, 'user_id', 'profile_id', 'id', 'id');
    }

    public function blacklists(): HasManyThrough
    {
        return $this->hasManyThrough(SeatHrBlacklist::class, SeatHrProfile::class, 'user_id', 'profile_id', 'id', 'id');
    }

    public function notes(): HasManyThrough
    {
        return $this->hasManyThrough(SeatHrNote::class, SeatHrProfile::class, 'user_id', 'profile_id', 'id', 'id');
    }
}
