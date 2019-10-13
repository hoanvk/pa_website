<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Policy extends Model
{
    //
    protected $table = 'tb_policy';
    protected $fillable = ['id', 'product_id', 'quotation_no', 'policy_no', 'client_name','client_address','client_id',
        'client_dob','start_date','end_date','agent_id','premium','period','status','ref_number', 'remarks'];

        // public static function quotation()
        // {
        //     # code...
        //     $request = request();
        //     $quotation_no = '';
        //     if ($request->session()->exists('quotation_no')) {
        //         //
        //         $quotation_no=$request->session()->get('quotation_no', '');
        //     }
        //     else{
        //         $last_item = Item::where([['item_tabl','=','TV401'], ['item_item','=','CHPAI']])->first();
            
        //         $quotation_no=$last_item->short_desc+1;        
        //         $last_item->update(['short_desc' => $quotation_no]);
        //         $quotation_no='TVL-'.$quotation_no;
        //         $request->session()->put('quotation_no', $quotation_no);
        //     } 
        //     return $quotation_no;
        // }
        // public static function quotation()
        // {
        //     # code...
            
        //     $last_item = optional(Item::where([['item_tabl','=','TV401'], ['item_item','=','CHPAI']])->first());
            
        //     $quotation_no=$last_item->short_desc+1;        
        //     $last_item->update(['short_desc' => $quotation_no]);
        //     $quotation_no='TVL-'.$quotation_no;
        //     return $quotation_no;
        // }
        public static function policyNumber($product_id)
    {
        # code...
        $autonumber = AutoNumber::where('product_id',$product_id)->get()->first();
        $last_number = $autonumber->last_number + 1;
        $autonumber->update(['last_number'=>$last_number]);
        return $last_number;
    }
        public function agent()
        {
            # code...
            return $this->belongsTo('App\Agent');
        }
        public function product()
        {
            # code...
            return $this->belongsTo('App\Product');
        }
        
        
           public function risks()
           {
               # code...
               return $this->hasMany('App\Risk');
               
           }
           
           
}