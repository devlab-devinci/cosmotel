<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kitchen extends Model
{
    /**
     * Get restaurants list that provide the kitchen type.
     */
    public function restaurant()
    {
        return $this->belongsToMany('App\Restaurant');
    }
}
