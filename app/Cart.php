<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Cart extends Model
{
    protected $fillable = [
        'restaurant_id',
        'product_id',
    ];

    //ログインユーザー（飲食店）のIDと一致するIDをcartsから取得
    public function showCart()
    {
        $restaurant_id = Auth('restaurant')->id();
        return $this->where('restaurant_id', $restaurant_id)->get();
    }

    //リレーション
    public function product()
    {
        return $this->belongsTo('\App\Models\Stock');
    }
}
