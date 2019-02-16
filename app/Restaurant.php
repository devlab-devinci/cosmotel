<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;
use App\Kitchen;
use App\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Restaurant extends Model
{
    protected $fillable = [
        'restaurateur_id', 'name', 'address', 'description', 'latitude', 'longitude', 'title', 'id'
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
     * Get the list of services provided by the restaurant
     */
    public function servicesId()
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
     * Get the menu extract for the restaurant
     */
    public function products()
    {
        return $this->hasMany('App\Product', 'restaurant_id');
    }

    /**
     * Get the restaurateur that owns the restaurant.
     */
    public function restaurateur()
    {
        return $this->belongsTo('App\Restaurateur', 'restaurateur_id');
    }

    /**
     * Get the list of discount provided by the restaurant
     */
    public function discounts()
    {
        return $this->hasMany('App\Discount', 'restaurant_id');
    }

    /**
     * Get the list of discount provided by the restaurant
     */
    public function openings()
    {
        return $this->hasMany('App\Opening', 'restaurant_id')->orderBy('day');
    }

    /**
     * Get the list of discount provided by the restaurant
     */
    public function reservations()
    {
        return $this->hasMany('App\Reservation', 'restaurant_id');
    }

    /**
     * Get the restaurateur that owns the restaurant.
     */
    public function images()
    {
        return $this->hasMany('App\Image', 'restaurant_id');
    }

    /**
     * Scope a query to find restaurant by distance to a location.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  mixed $lat
     * @param  mixed $lng
     * @param  mixed $radius
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIsWithinRadius($query, $lat, $lng, $radius)
    {
        $haversine = "(6378 * acos(cos(radians(" . $lat . ")) 
                    * cos(radians(`latitude`)) 
                    * cos(radians(`longitude`) 
                    - radians(" . $lng . ")) 
                    + sin(radians(" . $lat . ")) 
                    * sin(radians(`latitude`))))";

        return $query->select('*')
            ->selectRaw("{$haversine} AS distance")
            ->whereRaw("{$haversine} < ?", [$radius]);
    }
}
