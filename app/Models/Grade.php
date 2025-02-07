<?php

namespace App\Models;

use Eloquent;

class Grade extends Eloquent
{
    protected $fillable = ['name', 'mark_from', 'mark_to', 'remark'];
}
