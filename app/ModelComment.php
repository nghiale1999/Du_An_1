<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelComment extends Model
{
    protected $table='comment';
    public $timestamps=true;
    protected $fillable=[
        'id_blog','id_user','name','avatar','cmt','id_cmt'
    ];
}
