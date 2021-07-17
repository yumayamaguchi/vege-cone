<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Cart extends Model
{
    protected $fillable = [
        'restaurant_id',
        'product_id',
        'quantity',
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
        return $this->belongsTo('\App\Product');
    }

    //カートに追加の処理
    public function addCart($product_id, $quantity)
    {
        $restaurant_id = Auth('restaurant')->id();
        //データがなければ保存
        $cart_add_info = Cart::firstOrCreate([
            'product_id' => $product_id,
            'restaurant_id' => $restaurant_id,
            'quantity' => $quantity,
        ]);
        //保存された場合true,そうでない場合false
        if($cart_add_info->wasRecentlyCreated) {
            $message = 'カートに追加しました';
        } else {
            $message = 'カートに登録済みです';
        }
        return $message;
    }

    public function deleteCart($product_id)
    {
        $restaurant_id = Auth('restaurant')->id();
        $delete = $this->where('restaurant_id', $restaurant_id)->where('product_id', $product_id)->delete();

        if($delete > 0){
            $message = 'カートから1つの商品を削除しました。';
        } else {
            $message = '削除に失敗しました。';
        }
        return $message;
    }

    public function totalCart()
    {
        $restaurant_id = Auth('restaurant')->id();
        $my_carts = $this->where('restaurant_id', $restaurant_id)->get();

        //合計金額の表示
        $total_price = 0;
        foreach($my_carts as $my_cart) {
            $total_price += $my_cart->product->price * $my_cart->quantity;
        }
        return $total_price;
    }
}
