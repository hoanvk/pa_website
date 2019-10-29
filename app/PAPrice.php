<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PAPrice extends Model
{
    //
    protected $table = 'pa_prices';
    protected $fillable = ['id','product_id','plan_id','period_id','amount'];
    public function product()
    {
        # code...
        return $this->belongsTo('App\Product');
    }
    public function plan()
    {
        # code...
        return $this->belongsTo('App\Plan');
    }
    public function period()
    {
        # code...
        return $this->belongsTo('App\Period');
    }
}
