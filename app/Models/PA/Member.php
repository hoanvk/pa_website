<?php

namespace App\Models\PA;


use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //
    protected $table = 'tb_members';
    protected $fillable = ['id', 'insured_name','dob','age','insured_id','naty', 'ownship','gender', 'policy_id'];
    
}
