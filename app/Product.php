<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $fillable = ['id', 'title','name','product_type'];
    public function benefits()
           {
               # code...
               return $this->hasMany('App\Benefit');
               
           }
}
