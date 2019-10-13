<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    protected $table = 'tb_item';
    protected $fillable = ['id','item_item', 'item_tabl', 'short_desc', 'long_desc'];
}