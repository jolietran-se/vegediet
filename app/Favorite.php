<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $table = 'favorites';
    protected $fillable = [
        'dish_id',
        'user_id', 
    ];

    public function dishes()
    {
        return $this->hasMany('App\Dish');
    }
}
