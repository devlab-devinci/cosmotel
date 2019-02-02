<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opening extends Model
{
    protected $fillable = [
        'day', 'open_morning', 'open_time_morning', 'close_time_morning', 'open_lunch', 'open_time_lunch', 'close_time_lunch',
        'open_dinner', 'open_time_dinner', 'close_time_dinner'
    ];
}
