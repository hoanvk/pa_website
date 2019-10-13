<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insured extends Model
{
    //
    protected $table = 'tb_insured';
    protected $fillable = ['id', 'risk_id', 'insured_name',
    'insured_address', 
    'insured_id', 
    'insured_dob',                        
    'si',
    'rate',
    'premium'];
    public function risk()
        {
            # code...
            return $this->belongsTo(Risk::class);
        }
}
