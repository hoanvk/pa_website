<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Link extends Model
{
    //
    protected $connection = 'admin';
    use HasTranslations;
    protected $table = 'tb_links';
    protected $fillable = ['name','route','title','active','status'];

    protected $translatable = ['title'];
}
