<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    protected $fillable = [
        'Speciality',
        'user_id',
        'user_name',
    ];
}
