<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelProduct extends Model
{
    protected $table='product';
    public $timestamps=false;
    protected $fillable=[
        'id','tensp','giasp','loaisp','thuonghieu','giamgia','hinh','mota','id_user'
    ];
}
