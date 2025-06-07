<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScheduleService extends Model
{
    protected $fillable = [
        'contact',
        'frequency',
        'start_date',
        'day',
        'time',
    ];

    protected $casts = [
        'day' => 'array',
        'time' => 'array',
        'start_date' => 'datetime',
    ];
}
