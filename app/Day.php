<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $table = 'days';
    protected $fillable = [
        'user_id',
        'meal_id',
        'day',
        'day_farina',
        'day_lipid',
        'day_protein',
        'day_calories',
    ];

    // Day n - 1 User
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // Day 1 - n Meal
    public function meals()
    {
        return $this->hasMany('App\Meal');
    }
}
