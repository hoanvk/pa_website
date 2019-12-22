<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;

class InvoiceSeqNo extends Model
{
    //
    protected $table='seq_no_invoice';
    protected $fillable = ['id','invoice_no','inv_type','inv_serie','issuer'];
}
