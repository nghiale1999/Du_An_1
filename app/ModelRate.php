<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelRate extends Model
{
    protected $table='rate';
    public $timestamps=false;
    protected $fillable=[
        'id_blog','id_user','sosao'
    ];
}
