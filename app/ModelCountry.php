<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelCountry extends Model
{
    protected $table='country';
    public $timestamps=false;
    protected $fillable=[
        'name'
    ];
}
