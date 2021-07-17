<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Favorite extends Model
{
    protected $fillable = [
        'restaurant_id',
        'product_id',
    ];

    //productsとのリレーション
    public function product(): BelongsTo
    {
        return $this->belongsTo('App\Product');
    }

    //ログインユーザー（飲食店）のIDと一致するIDをfavoritesから取得
    public function showCart()
    {
        $restaurant_id = Auth('restaurant')->id();
        return $this->where('restaurant_id', $restaurant_id)->get();
    }

    //お気に入り追加処理
    public function addFavorite($product_id)
    {
        $restaurant_id = Auth('restaurant')->id();
        //データがなければ保存
        $favorite_add_info = Favorite::firstOrCreate([
            'restaurant_id' => $restaurant_id,
            'product_id' => $product_id,
        ]);
        //保存された場合true,そうでない場合false
        if($favorite_add_info->wasRecentlyCreated) {
            $message = 'お気に入りに追加しました';
        } else {
            $message = 'お気に入りに登録済みです';
        }
        return $message;
    }

    //お気に入りから削除処理
    public function deleteFavorite($product_id)
    {
        $restaurant_id = Auth('restaurant')->id();
        $delete = $this->where('restaurant_id', $restaurant_id)->where('product_id', $product_id)->delete();

        if($delete > 0){
            $message = 'お気に入りから1つの商品を削除しました。';
        } else {
            $message = '削除に失敗しました。';
        }
        return $message;
    }
}
