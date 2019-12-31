<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    //
    protected $table = 'revenue';

    public function restaurant()
    {
        return $this->belongsTo('App\Restaurant','id_restaurant','id');

    }

    public function user()
    {
        return $this->belongsTo('App\User','id_user','id');
    }
}
