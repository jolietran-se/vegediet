<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $table = 'ingredient';
    protected $filable = [
        'name',
        'farina',
        'protein',
        'lipid',
        'calories',
    ];

    public function dishes()
    {
        return $this->belongsToMany('App\Dish');
    }
}
