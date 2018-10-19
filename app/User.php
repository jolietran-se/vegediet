<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'password', 
        'facebook_id', 
        'facebook_id', 
        'facebook_id', 
        'phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
        'remember_token',
    ];

    
    // User 1 - n Dish
    public function dishes()
    {
        return $this->hasMany('App\Dish');
    }

    // User 1 - n Day 
    public function days()
    {
        return $this->hasMany('App\Day');
    }

    // User n - n Ingredient
    public function ingredient()
    {
        return $this->belongsToMany('App\Ingredient');
    }
    
    // User n - n Role
    public function roles()
    {
        return $this->belongsToMany('App\Role');    
    }
    
    // User 1 - 1 Favorite
    public function favorite()
    {
        return $this->hasOne('App\Favorite');
    }
}
