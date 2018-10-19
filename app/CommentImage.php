<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentImage extends Model
{
    protected $table = 'comment_images';
    protected $fillable = [
    	'comment_id',
    	'image',
    ];

    public function comment()
    {
    	return $this->belongsTo('App\Comment');
    }
}
