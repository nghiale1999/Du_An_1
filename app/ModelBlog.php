<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelBlog extends Model
{
    protected $table = 'blog';
    public $timestamps=false;
    protected $fillable=[
        'tieude','hinh','noidung'
    ];
}
