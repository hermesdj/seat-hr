<?php

namespace Cryocaustik\SeatHr\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SeatHrProfile extends Model
{
    protected $fillable = [ 'user_id', 'probation'];
    protected $casts = [
        'probation' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function applications(): HasMany
    {
        return $this->hasMany(SeatHrApplication::class, 'profile_id', 'id');
    }
}
