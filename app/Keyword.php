<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    protected $fillable = [
        'Keyword',
        'user_id',
        'user_name',
    ];
}
