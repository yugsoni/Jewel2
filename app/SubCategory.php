<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = [
        'MainCategory',
        'SubCategory',
        'user_id',
        'user_name',
    ];
}
