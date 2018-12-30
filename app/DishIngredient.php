<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DishIngredient extends Model
{
    protected $table = 'dish_ingredient';
    protected $fillable = [
    	'dish_id',
    	'ingredient_id',
    	'weight',
    ];

    // Mỗi món ăn có nhiều nguyên liệu khác nhau
    public function dish()
    {
    	return $this->belongsTo('App\Dish');
    }
}
