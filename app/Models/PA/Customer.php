<?php

namespace App\Models\PA;

use App\Models\PA\Policy;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
     protected $table = 'tb_customers';
     protected $fillable = ['id','name','address','email','policy_id','status','mobile','natlty','city','dob','tgram','gender'];
     public function policy()
        {
            # code...
            return $this->belongsTo(Policy::class);
        }

}
