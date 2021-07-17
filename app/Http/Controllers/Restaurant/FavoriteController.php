<?php

namespace App\Http\Controllers\Restaurant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Favorite;
use App\Product;

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
        $product = DB::table('products')->where('id', $product_id)->get();
        $message = $favorite->addFavorite($product_id);

        redirect()->route('products.show', [
            'product' => $product,
        ]);
    }
}
