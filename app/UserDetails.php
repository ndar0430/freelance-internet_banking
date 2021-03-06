<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    protected $table = 'users_details'; 
    protected $primaryKey = 'id';


    public function user()
    {
        return $this->belongsTo('App\User', 'id', 'users_details_id');
    }


}
