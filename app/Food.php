<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    //
    protected $table = 'foods';

    public function restaurant()
    {
        return $this->belongsTo('App\Restaurant','id_restaurant','id');
    }
}
