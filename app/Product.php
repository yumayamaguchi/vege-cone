<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [
        'name',
        'introduction',
        'amount',
        'price',
        'origin',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\User');
    }

}
