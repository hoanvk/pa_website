<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
    protected $connection = 'admin';
    protected $table = 'tb_permissions';
    protected $fillable = ['id', 'title','name'];
    public function roles()
    {
        # code...
        return $this->belongsToMany(Role::class,'tb_role_permission');
    }
}
