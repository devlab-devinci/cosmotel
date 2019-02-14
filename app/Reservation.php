<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'restaurant_id', 'discount', 'client_count', 'dateTime', 'client_count', 'posts', 'stories', 'status'
    ];

    public function restaurant()
    {
        return $this->belongsTo('App\Restaurant', 'restaurant_id');
    }

    public function influencer()
    {
        return $this->belongsTo('App\Influencer', 'influencer_id');
    }

}
