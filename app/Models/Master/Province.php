<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    //
    protected $connection = 'admin';
    protected $table = 'tb_provinces';
    protected $fillable = ['id','name','title'];
}
