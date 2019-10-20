<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    //
    protected $table = 'periods';
    protected $fillable = ['id','title','name','product_id','qty','unit'];
    public function product()
    {
        # code...
        return $this->belongsTo('App\Product');
    }
}
