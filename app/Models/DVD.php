<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DVD extends Model
{
    protected $hidden = [ 'created_at', 'release_date', 'updated_at'];

    public function rating()
    {
        return $this->belongsTo('App\Models\Rating');
    }

    public function genre()
    {
        return $this->belongsTo('App\Models\Genre');
    }

    public function label()
    {
        return $this->belongsTo('App\Models\Label');
    }

    protected $table = 'dvds';
}
