<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    /**
     * Get restaurants that provide the service.
     */
    public function restaurant()
    {
        return $this->belongsToMany('App\Restaurant');
    }
}
