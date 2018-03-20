<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    public function user()
    {
        return $this->belongsTo('App\RoleUser', 'user_id', 'user_id');
    }

    public function userdetails()
    {
        return $this->hasMany('App\UserDetails', 'id', 'users_details_id');
    }


    public function bankaccount()
    {
        return $this->hasMany('App\BankAccount', 'user_id', 'id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'show_password', 'users_details_id', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
