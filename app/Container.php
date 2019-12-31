<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Container extends Model
{
    //
    protected $table = 'containers';

    public function restaurant()
    {
        return $this->belongsTo('App\Restaurant','id_restaurant','id');
    }
}
