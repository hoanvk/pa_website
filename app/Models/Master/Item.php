<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Item extends Model
{
    use HasTranslations;
    //
    protected $connection = 'admin';
    protected $table = 'tb_items';
    protected $fillable = ['id','item_item', 'item_tabl', 'short_desc', 'long_desc'];
    protected $translatable = ['long_desc'];
}