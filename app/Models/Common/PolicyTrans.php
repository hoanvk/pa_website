<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;

class PolicyTrans extends Model
{
    //
    protected $table = 'tb_policy_trans';
     protected $fillable = ['id','policy_no','tran_type','tran_stat','tran_date','remarks','header_id'];
}
