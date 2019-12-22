<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;

class PolicyDoc extends Model
{
    //
    protected $table = 'tb_policy_docs';
    protected $fillable = ['id','policy_id','doc_type','file_name','document'];
}
