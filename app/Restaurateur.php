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

    public function getFirstnameAttribute()
    {
        return $this->user->firstname;
    }

    public function getLastnameAttribute()
    {
        return $this->user->lastname;
    }

    public function getFullnameAttribute()
    {
        return $this->firstname.' '.$this->lastname;
    }
}
