<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    public function dvd()
    {
        return $this->belongsTo('App\Models\DVD');
    }
}
