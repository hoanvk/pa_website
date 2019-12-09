<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $table = 'roles';
    protected $fillable = ['id', 'title'];
    public function permissions()
    {
        # code...
        return $this->belongsToMany(Permission::class,'role_permission');
    }
}
