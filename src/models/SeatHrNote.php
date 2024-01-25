<?php

namespace Cryocaustik\SeatHr\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SeatHrNote extends Model
{
    protected $fillable = [
        'profile_id',
        'created_by',
        'severity',
        'note',
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
