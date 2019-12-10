<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $connection = 'admin';
    protected $table = 'tb_roles';
    protected $fillable = ['id', 'title'];
    public function permissions()
    {
        # code...
        return $this->belongsToMany(Permission::class,'tb_role_permission');
    }
}
