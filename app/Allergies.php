<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allergies extends Model
{
    protected $table = 'allergies';
    protected $fillable = [
    	'name',
    	'ingredient_id',
    	'dish_id',
    ];
    
    public function users()
    {
        return $this->hasMany('App\User');
    }
    
    public function ingredients()
    {
        return $this->hasMany('App\Ingrdient');
    }
}
