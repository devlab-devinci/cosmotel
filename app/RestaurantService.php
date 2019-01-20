<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantService extends Model
{
    protected $table = 'restaurant_service';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'restaurant_id',
        'service_id'
    ];
}
