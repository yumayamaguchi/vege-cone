<?php

namespace App\Http\Controllers\Restaurant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Favorite;
use App\Product;
use App\Restaurant;

class FavoriteController extends Controller
{
    //お気に入りの出力
    public function index(Favorite $favorite)
    {
        $my_favorites = $favorite->showCart();

        return view('restaurant.show', compact('my_favorites'));
    }


    //お気に入り追加処理
    public function add(Request $request, Favorite $favorite)
    {
        //お気に入りに追加処理
        $product_id = $request->product_id;
        $product = Product::find($product_id);
        $message = $favorite->addFavorite($product_id);
        return view('products.show', [
            'product' => $product,
            'message' => $message,
        ]);
    }

    //お気に入り削除処理
    public function delete(Request $request, Favorite $favorite)
    {
        $product_id = $request->product_id;
        $message = $favorite->deleteFavorite($product_id);

        $id = Auth('restaurant')->id();
        $restaurant = Restaurant::where('id', $id)->first();
        $favorites = Favorite::where('restaurant_id', $id)->paginate(2);

        return view('restaurant.show',[
            'message' => $message,
            'restaurant' => $restaurant,
            'favorites' => $favorites,
        ]);

    }
}
