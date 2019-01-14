<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DishCategory extends Model
{
    protected $table = 'dish_category';
    protected $fillable = [
    	'dish_id',
    	'category_id',
    ];

    // Mỗi món ăn có nhiều nguyên liệu khác nhau
    public function dish()
    {
    	return $this->belongsTo('App\Dish');
    }
}
