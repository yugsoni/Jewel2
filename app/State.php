<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
        'State',
        'user_id',
        'user_name',
    ];
}
