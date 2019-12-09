<?php

namespace App\Models\Master;

use App\Models\Master\Product;
use Illuminate\Database\Eloquent\Model;

class AutoNumber extends Model
{
    //
    protected $connection = 'admin';
    protected $table = 'auto_numbers';
    protected $fillable = [
        'id', 'product_id', 'last_number','start_number', 'end_number'
    ];
    public function product()
        {
            # code...
            return $this->belongsTo(Product::class);
        }
            
}
