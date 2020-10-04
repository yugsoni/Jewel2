<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'Category',
        'user_id',
        'user_name',
    ];
}
