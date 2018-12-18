<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurateur extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id'
    ];

    /**
     * Get the user that is the restaurateur.
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * Get restaurants list for the restaurateur.
     */
    public function restaurant()
    {
        return $this->hasOne('App\Restaurant');
    }
}
