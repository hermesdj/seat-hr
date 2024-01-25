<?php

namespace Cryocaustik\SeatHr\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SeatHrAnswer extends Model
{
    protected $fillable = [
        'application_id',
        'question_id',
        'response',
    ];

    public function question(): BelongsTo
    {
        return $this->belongsTo(SeatHrQuestion::class);
    }

    public function application(): BelongsTo
    {
        return $this->belongsTo(SeatHrApplication::class, 'application_id');
    }
}
