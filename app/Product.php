<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    public function producer(): BelongsTo
    {
        return $this->belongsTo('App\Producer');
    }
}
