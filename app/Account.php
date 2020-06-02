<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    //
    protected $fillable = [
        'user_id',
        'token',
        'account_id',
        'accountNumber',
        'beneficiaryBranckCode',
    ];
}
