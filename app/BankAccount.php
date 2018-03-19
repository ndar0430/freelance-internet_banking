<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    protected $table = 'bank_account';
    protected $primaryKey = 'id';
    

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }


}
