<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DVD extends Model
{
    public function rating()
    {
        return $this->hasOne('App\Models\Rating', 'id', 'rating_id');
    }

    public function genre()
    {
        return $this->hasOne('App\Models\Genre', 'id', 'genre_id');
    }

    public function label()
    {
        return $this->hasOne('App\Models\Label', 'id', 'label_id');
    }

    protected $table = 'dvds';
}
