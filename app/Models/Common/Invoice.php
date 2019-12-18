<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //
    protected $table = 'tb_invoices';
     protected $fillable = ['id','inv_name','inv_address','inv_taxcode','policy_id','policy_no', 'invoice_no','inv_series', 
        'inv_type', 'inv_rate','premium','vat_amt','total_amt'];
}
