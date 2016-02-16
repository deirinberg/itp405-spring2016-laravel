<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public function dvd()
    {
        return $this->belongsTo('App\Models\DVD', 'rating_id', 'id');
    }
}
