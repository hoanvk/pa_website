<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PASeqNo extends Model
{
    //
    protected $table = 'seq_no_pa';
    protected $fillable = ['id'];
    public static function quotation_no()
    {
        # code...  
        $quotation_no = PASeqNo::create();    
        return 'PA-QU-'.$quotation_no->id.'-'.substr(date("Y"),2,2);  
        
    }
}
