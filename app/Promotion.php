<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    //
    protected $table = 'promotions';
    protected $fillable = ['id', 'promo_code','product_id', 'discount', 'start_date','end_date'];
    public function product()
    {
        # code...
        return $this->belongsTo('App\Product');
    }
}
