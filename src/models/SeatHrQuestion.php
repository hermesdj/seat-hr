<?php

namespace Cryocaustik\SeatHr\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SeatHrQuestion extends Model
{
    //
    protected $fillable = [
        'name',
        'type',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function corporationsUsing(): HasMany
    {
        return $this->hasMany(SeatHrCorporationQuestion::class, 'question_id', 'id');
    }
}
