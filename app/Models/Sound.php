<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sound extends Model
{
    public function dvd()
    {
        return $this->belongsTo('App\Models\DVD');
    }
}
