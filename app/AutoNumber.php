<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AutoNumber extends Model
{
    //
    protected $table = 'auto_numbers';
    protected $fillable = [
        'id', 'product_id', 'last_number','start_number', 'end_number'
    ];
    public function product()
        {
            # code...
            return $this->belongsTo('App\Product');
        }
            
}
