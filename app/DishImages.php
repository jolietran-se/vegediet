<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DishImages extends Model
{
    protected $table = 'dish_images';
    protected $fillable = [
    	'dish_id',
    	'image_id',
    ];

    // Mỗi món ăn có nhiều ảnh
    public function imageDish()
    {
    	return $this->belongsTo('App\Dish');
    }
}
