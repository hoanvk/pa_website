<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;

class OnePayLog extends Model
{
    //
    protected $table = 'tb_payment_logs';
    protected $fillable = ['id','policy_id','request_url','response_url'
    ];
}
