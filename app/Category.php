<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'name',
    ];

    // Category n - n Dish
    public function dishes()
    {
        return $this->belongsToMany('App\Dish', 'dish_category');
    }
}
