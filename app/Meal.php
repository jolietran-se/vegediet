<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    protected $table = 'meals';
    protected $fillable = [
        'dish_id',
        'name',
        'meal_farina',
        'meal_protein',
        'meal_lipid',
        'meal_calories',
    ];

    public function dishes()
    {
        return $this->hasMany('App\Dish');
    }
    
    public function day()
    {
        return $this->belongsTo('App\Day');
    }
}
