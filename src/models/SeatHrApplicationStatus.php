<?php

namespace Cryocaustik\SeatHr\models;

use \Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SeatHrApplicationStatus extends Model
{
    protected $fillable = ['application_id', 'status_id', 'assigned_to', 'assigned_by', 'decision_by', 'active'];
    protected $casts = [
        'active' => 'boolean',
    ];

    public function status(): BelongsTo
    {
        return $this->belongsTo(SeatHrStatus::class, 'status_id');
    }

    public function assignee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to', 'id');
    }

    public function assigner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_by', 'id');
    }

    public function decider(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_by', 'id');
    }

    public function getNameAttribute()
    {
        return $this->status->name;
    }

    public function getColorAttribute()
    {
        return $this->status->color;
    }

    public function getAssignedToNameAttribute()
    {
        return $this->assignee->name;
    }

    public function getAssignerNameAttribute()
    {
        return $this->assigner ? $this->assigner->name : '';
    }

    public function getDeciderNameAttribute()
    {
        return $this->assigner->name;
    }

    public function scopeCurrentStatus($query)
    {
        return $query->where('active', 1);
    }
}
