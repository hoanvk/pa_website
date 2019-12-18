<?php

namespace App\Models\Common;

use App\Models\PA\PARisk;
use App\Models\Master\Agent;
use Illuminate\Http\Request;
use App\Models\Master\Product;
use App\Models\Common\Customer;
use App\Models\Travel\TravelRisk;
use Illuminate\Database\Eloquent\Model;

class PolicyHeader extends Model
{
    //
    protected $table = 'tb_policy_header';
    protected $fillable = ['id', 'product_id', 'quotation_no', 'policy_no', 'start_date','end_date','agent_id',
        'premium','period','status','ref_number', 'remarks', 'promo_code', 'customer_id', 'pay_method'];

        
        public function agent()
        {
            # code...
            return $this->belongsTo(Agent::class);
        }
        public function product()
        {
            # code...
            return $this->belongsTo(Product::class);
        }
        public function customer()
        {
            # code...
            return $this->belongsTo(Customer::class,'customer_id','id');
        }
        
        public function risks()
        {
            # code...
            return $this->hasMany(TravelRisk::class,'policy_id','id');
            
        }
           
        public function parisk()
        {
            # code...
            return $this->hasOne(PARisk::class,'policy_id','id');
            
        }   
}