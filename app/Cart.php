<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Cart extends Model
{
    protected $fillable = [
        'restaurant_id',
        'product_id',
    ];
}
