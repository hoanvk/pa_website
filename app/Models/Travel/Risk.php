<?php

namespace App\Models\Travel;

use Illuminate\Database\Eloquent\Model;

class Risk extends Model
{
    //
    protected $table = 'tb_risk';
    protected $fillable = ['id','policy_id','policy_type',    
    'premium',            
    'plan_id',    
    'destination_id',
    'adult_qty',
    'dependent_qty'];
    public function policy()
        {
            # code...
            return $this->belongsTo(Policy::class);
        }
    public function plan()
        {
            # code...
            return $this->belongsTo(Plan::class,'plan_id');
        }
        public function destination()
        {
            # code...
            return $this->belongsTo(Destination::class);
        }
}
