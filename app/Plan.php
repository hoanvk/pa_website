<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    //
    protected $table = 'plans';
    protected $fillable = ['id', 'title','name','product_id'];
    public function product()
    {
        # code...
        return $this->belongsTo('App\Product');
    }
}
