<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    public function users(){
        return Role::hasMany('App\User', 'role_id');
    }
}
