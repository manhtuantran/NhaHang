<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desk extends Model
{
    //
    protected $table = 'desks';

    public function restaurant()
    {
        return $this->belongsTo('App\Restaurant','id_restaurant','id');
    }
}
