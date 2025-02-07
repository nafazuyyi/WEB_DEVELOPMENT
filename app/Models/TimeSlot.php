<?php

namespace App\Models;

use Eloquent;

class TimeSlot extends Eloquent
{
    protected $fillable = ['ttr_id', 'full', 'time_from', 'time_to', 'hour_from', 'min_from', 'hour_to', 'min_to'];

    public function tt_record()
    {
        return $this->belongsTo(TimeTableRecord::class, 'ttr_id');
    }
}
