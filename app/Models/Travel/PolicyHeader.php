<?php

namespace App\Models\Travel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class PolicyHeader extends Model
{
    //
    protected $table = 'tb_policy_header';
    protected $fillable = ['id', 'product_id', 'quotation_no', 'policy_no', 'start_date','end_date','agent_id','premium','period','status','ref_number', 'remarks', 'promo_code', 'customer_id'];

        public static function policyNumber($product_id)
        {
            # code...
            $autonumber = AutoNumber::where('product_id',$product_id)->get()->first();
            $last_number = $autonumber->last_number + 1;
            $autonumber->update(['last_number'=>$last_number]);
            return $last_number;
        }
        public static function defaultAgent()
        {
            # code...
            
        }
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
        
        public function risks()
        {
            # code...
            return $this->hasMany(Risk::class);
            
        }
          
}