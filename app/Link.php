<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Link extends Model
{
    //
    use HasTranslations;
    protected $table = 'links';
    protected $fillable = ['name','route','title','active','status'];

    protected $translatable = ['title'];
}
