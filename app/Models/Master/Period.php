<?php

namespace App\Models\Master;

use App\Models\Master\Product;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    //
    protected $connection = 'admin';
    protected $table = 'periods';
    protected $fillable = ['id','title','name','product_id','qty','unit'];
    public function product()
    {
        # code...
        return $this->belongsTo(Product::class);
    }
}
