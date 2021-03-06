<?php

namespace App\Models\Common;

use App\Models\PA\PolicyHeader;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
     protected $table = 'tb_customers';
     protected $fillable = ['id','name','address','email','policy_id','status','mobile','natlty','city','dob','tgram','gender'];
     public function policy()
        {
            # code...
            return $this->belongsTo(PolicyHeader::class);
        }

}
