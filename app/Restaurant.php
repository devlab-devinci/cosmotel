<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [
        'restaurateur_id', 'label', 'address', 'description', 'latitude', 'logitude', 'tags'
    ];

    /**
     * Get the the restaurant's owner.
     */
    public function restaurateur()
    {
        return $this->belongsTo('App\Restaurateur', 'restaurateur_id');
    }
}
