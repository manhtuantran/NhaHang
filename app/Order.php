<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = 'orders';

    public function user()
    {
        return $this->belongsTo('App\User','id_user','id');
    }

    public function desk()
    {
        return $this->belongsTo('App\Desk','id_desk','id');
    }
}
