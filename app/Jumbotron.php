<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Jumbotron extends Model
{
    //
    use HasTranslations;
    protected $table = 'jumbotrons';
    protected $fillable = ['name','title', 'description'];
    protected $translatable = ['title', 'description'];
}
