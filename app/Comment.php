<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = [
    	'dish_id',
    	'user_id',
    	'likes_number',
    	'comment',
    ];

    // Comment n - 1 Dish
    public function dish()
    {
    	return $his->belongsTo('App\Dish');
    }
    
    // Comment n - 1 User
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    // Comment 1 - n Comment_images 
    public function commentimages()
    {
    	return $this->hasMany('App\CommentImage');
    }
}
