<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    //
    protected $table = 'recipe';

    public function material()
    {
        return $this->belongsTo('App\Material','id_material','id');
    }

    public function materialRecipe()
    {
        return $this->hasMany('App\MaterialRecipe','id_recipe','id');
    }
}
