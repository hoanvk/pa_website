<?php

namespace App;

use App\Item;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //
    protected $table = 'members';
    protected $fillable = ['id', 'insured_name','dob','age','insured_id','naty', 'ownship','gender', 'policy_id'];
    
}
