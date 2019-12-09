<?php

namespace App\Models\Travel;

use Illuminate\Database\Eloquent\Model;

class TravelSeqNo extends Model
{
    //
    protected $table = 'seq_no_travel';
    protected $fillable = ['id'];
    public static function quotation_no()
    {
        # code...  
        $quotation_no = TravelSeqNo::create();    
        return 'TVL-QU-'.$quotation_no->id.'-'.substr(date("Y"),2,2);  
        
    }
}
