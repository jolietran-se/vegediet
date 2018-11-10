<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $table = 'ingredients';
    protected $fillable = [
        'name',
        'farina',
        'protein',
        'lipid',
        'calories',
    ];

    public function dishes()
    {
        return $this->belongsToMany('App\Dish')->withPivot('weight');
    }
}
