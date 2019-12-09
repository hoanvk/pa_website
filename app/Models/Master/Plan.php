<?php

namespace App\Models\Master;

use App\Models\Master\Product;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    //
    protected $connection = 'admin';
    protected $table = 'plans';
    protected $fillable = ['id', 'title','name','product_id'];
    public function product()
    {
        # code...
        return $this->belongsTo(Product::class);
    }
}
