<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    //
    protected $table = 'materials';

    public function container()
    {
        return $this->belongsTo('App\Container','id_container','id');
    }
}
