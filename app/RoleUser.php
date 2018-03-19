<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $table = 'role_user';
    public $timestamps = false;
    protected $primaryKey = 'user_id';

    public function role()
    {
        return $this->hasMany('App\Role', 'id', 'role_id');
    }

    public function user()
    {
        return $this->hasMany('App\User', 'id', 'user_id');
    }
    
}
