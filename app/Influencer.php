<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Influencer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'username', 'followers', 'media_count'
    ];

    /**
     * Get the user that is the influencer.
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
