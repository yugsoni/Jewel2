<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'Country',
        'user_id',
        'user_name',
    ];
}
