<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'phone', 'type', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the restaurateur record associated with the user.
     */
    public function restaurateur()
    {
        return $this->hasOne('App\Restaurateur', 'user_id');
    }

    /**
     * Get the influencer record associated with the user.
     */
    public function influencer()
    {
        return $this->hasOne('App\Influencer', 'user_id');
    }
}
