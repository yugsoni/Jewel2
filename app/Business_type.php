<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business_type extends Model
{
    protected $fillable = [
        'Business_type',
        'user_id',
        'user_name',
    ];
}
