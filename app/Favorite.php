<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $table = 'favorites';
    protected $fillable = [
        'user_id', 
        'dish_id',
    ];

    public function dishes()
    {
        return $this->hasMany('App\Dish');
    }

    public function user()
    {
        return $this->belongsto('App\User');
    }
}
