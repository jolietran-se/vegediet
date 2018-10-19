<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CookingStep extends Model
{
    protected $table = 'cooking_steps';
    protected $fillable = [
    	'dish_id',
    	'step',
    ];

    // Dish 1 - n CookingStep
    public function dish()
    {
    	return $this->belongsTo('App\Comment');
    }
}
