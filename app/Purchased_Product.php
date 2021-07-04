<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchased_Product extends Model
{
    protected $table = 'purchased_products';

    protected $fillable = [
        'product_id',
        'quantity',
    ];


    //商品とのリレーション
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
