<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [
        'restaurateur_id', 'address', 'description', 'latitude', 'logitude'
    ];

    /**
     * Get the list of services provided by the restaurant
     */
    public function services()
    {
        return $this->belongsToMany('App\Service', 'restaurant_service',
            'restaurant_id', 'service_id');
    }

    /**
     * Get kitchens for the restaurant.
     */
    public function kitchens()
    {
        return $this->belongsToMany('App\Kitchen', 'restaurant_kitchen',
            'restaurant_id', 'kitchen_id');
    }

    /**
     * Get the restaurateur that owns the restaurant.
     */
    public function restaurateur()
    {
        return $this->belongsTo('App\Restaurateur');
    }
}
