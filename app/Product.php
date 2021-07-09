<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [
        'name',
        'category_number',
        'introduction',
        'amount',
        'price',
        'origin',
        'image',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\User');
    }
}
