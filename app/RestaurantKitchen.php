<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantKitchen extends Model
{
    protected $table = 'restaurant_kitchen';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'restaurant_id',
        'kitchen_id'
    ];
}
