<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    //
    protected  $table = 'restaurants';

    public function container()
    {
        return $this->hasMany('App\Container','id_restaurant','id');
    }

    public function user()
    {
        return $this->hasMany('App\User','id_restaurant','id');
    }
}
