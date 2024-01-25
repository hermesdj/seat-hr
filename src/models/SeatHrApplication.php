<?php

namespace Cryocaustik\SeatHr\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;


class SeatHrApplication extends Model
{
    protected $fillable = [
        'corporation_id',
        'profile_id',
        'status_id',
        'can_reapply',
    ];

    protected $casts = [
        'can_reapply' => 'boolean',
    ];

    public function profile(): BelongsTo
    {
        return $this->belongsTo(SeatHrProfile::class, 'profile_id');
    }

    public function corporation(): BelongsTo
    {
        return $this->belongsTo(SeatHrCorporation::class, 'corporation_id');
    }

    public function status(): HasMany
    {
        return $this->hasMany(SeatHrApplicationStatus::class, 'application_id')->with('status');
    }

    public function currentStatus(): HasOne
    {
        return $this->hasOne(SeatHrApplicationStatus::class, 'application_id')
            ->where('active', true)
            ->with('status');
    }

    public function questions(): HasManyThrough
    {
        return $this->hasManyThrough(SeatHrQuestion::class, SeatHrAnswer::class, 'application_id', 'id', 'id', 'question_id');
    }

    public function answers(): HasMany
    {
        return $this->hasMany(SeatHrAnswer::class, 'application_id', 'id')->with('question');
    }

    public function scopeCorporationView($query, $corporation_id)
    {
        return $query->where('corporation_id', $corporation_id);
    }

    public function scopeView($query)
    {
        return $query->with(['answers:id,application_id,question_id,response', 'answers.question:id,name,type', 'status']);
    }
}
