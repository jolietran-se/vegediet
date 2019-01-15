<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $table = 'dishes';
    protected $fillable = [
        'name',
        'description',
        'picture',
        'farina_amount',
        'protein_amount',
        'lipid_amount',
        'calories_amount',
        'like_number',
    ];

    // Dish n - 1 User
    public function user()
    {
        return $this->belongsTo('App\User', 'owner_id');
    }

    // Dish n - 1 Favorite
    public function favorites()
    {
        return $this->hasMany('App\Favorite');
    }

    // Dish n - 1 Meal
    public function meal()
    {
        return $this->belongsTo('App\Meal');
    }

    // Dish 1 - n Comment
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    // Dish 1 - n CookingStep
    public function cookingsteps()
    {
        return $this->hasMany('App\CookingStep');
    }

    // Dish n - n Ingredient
    public function ingredients()
    {
        return $this->belongsToMany('App\Ingredient')->withPivot('weight')->withTimestamps();
    }

    // Dish n - n Category
    public function categories()
    {
        return $this->belongsToMany('App\Category', 'dish_category')->withTimestamps();
    }

    // Dish 1 - n ImageUploads
    public function dishImages()
    {
        return $this->hasMany('App\DishImages');
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($dish) { // before delete() method call this
            $dish->cookingsteps()->delete();
            $dish->dishImages()->delete();
            $dish->ingredients()->detach();
            $dish->categories()->detach();
        });
    }
    
}
