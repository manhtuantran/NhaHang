<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    //
    protected $table = 'order-detail';

    public function food()
    {
        return $this->belongsTo('App\Food','id_food','id');
    }
}
