<?php

namespace App\Models\Master;

use App\Models\Master\Product;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    //
    protected $connection = 'admin';
    protected $table = 'tb_promotions';
    protected $fillable = ['id', 'promo_code','product_id', 'discount', 'start_date','end_date'];
    public function product()
    {
        # code...
        return $this->belongsTo(Product::class);
    }
}
