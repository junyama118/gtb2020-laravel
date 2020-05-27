<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    //
    protected $fillable = [
        'srcUser_id',
        'distUser_id',
        'amount',
        'comment',
    ];
}
