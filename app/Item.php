<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Item extends Model
{
    use HasTranslations;
    //
    protected $table = 'tb_item';
    protected $fillable = ['id','item_item', 'item_tabl', 'short_desc', 'long_desc'];
    protected $translatable = ['long_desc'];
}