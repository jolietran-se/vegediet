<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageUploads extends Model
{
    // Tải lên nhiều ảnh 
    protected $table = 'image_uploads';
    protected $fillable = [
    	'title',
    	'image',
    ];
}
