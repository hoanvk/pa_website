<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
    protected $table = 'permissions';
    protected $fillable = ['id', 'title','name'];
    public function roles()
    {
        # code...
        return $this->belongsToMany(Role::class,'role_permission');
    }
}
