<?php

namespace App\Models\PA;

use App\Models\Master\Plan;
use App\Models\Master\Period;
use App\Models\Master\Product;
use Illuminate\Database\Eloquent\Model;

class PAPrice extends Model
{
    //
    protected $table = 'pa_prices';
    protected $fillable = ['id','product_id','plan_id','period_id','amount'];
    public function product()
    {
        # code...
        return $this->belongsTo(Product::class);
    }
    public function plan()
    {
        # code...
        return $this->belongsTo(Plan::class);
    }
    public function period()
    {
        # code...
        return $this->belongsTo(Period::class);
    }
}
