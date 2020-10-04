<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'item_name',
        'item_price',
        'item_description',
        'item_image',
        'user_id',
        'user_name',
    ];
}
