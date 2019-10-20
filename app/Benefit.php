<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Benefit extends Model
{
    //
    protected $table = 'benefits';
    protected $fillable = ['id','title','name','product_id'];
    public function product()
    {
        # code...
        return $this->belongsTo('App\Product');
    }
}
