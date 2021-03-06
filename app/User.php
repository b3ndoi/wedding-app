<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Laravel\Cashier\Billable;
class User extends Authenticatable
{
    use Notifiable;
    // use Billable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'surname', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function events(){
        return User::hasMany('App\Event', 'user_id');
    }

    public function role(){
        return User::belongsTo('App\Role');
    }
}
