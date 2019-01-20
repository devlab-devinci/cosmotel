<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'label', 'slug'
    ];

    /**
     * Get restaurants list that provide the kitchen type.
     */
    public function restaurants()
    {
        return $this->belongsToMany('App\Restaurant', 'restaurant_service', 'service_id', 'restaurant_id');
    }
}
