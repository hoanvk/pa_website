<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
     protected $table = 'customers';
     protected $fillable = ['id','name','address','email','policy_id','status','mobile','natlty','city','dob','tgram'];
     public function policy()
        {
            # code...
            return $this->belongsTo('App\Policy');
        }

}
