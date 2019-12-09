<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Jumbotron extends Model
{
    //
    protected $connection = 'admin';
    use HasTranslations;
    protected $table = 'jumbotrons';
    protected $fillable = ['name','title', 'description', 'status'];
    protected $translatable = ['title', 'description'];
}
