<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wording extends Model
{
    //
    protected $table = 'wordings';
    protected $fillable = ['id', 'content', 'product_type'];
}
