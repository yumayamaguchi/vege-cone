<?php

namespace App\Http\Controllers\Restaurant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Cart;
use App\Restaurant;


class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:restaurant')->except('logout');
    }

    //カートの出力
    public function index(Cart $cart)
    {
        $my_carts = $cart->showCart();
        $login_restaurant_name = Auth('restaurant')->user()->restaurant_name;

        return view('restaurant.cart', [
            'my_carts' => $my_carts,
            'login_restaurant_name' => $login_restaurant_name,
        ]);
    }

    public function add(Request $request)
    {
        $restaurant_id = Auth::id();
        $product_id = $request->product_id;

        $cart_add_info = Cart::firstOrCreate(['product_id' => $product_id, 'restaurant_id' => $restaurant_id]);
        if($cart_add_info->wasRecentlyCreated){
            $message = 'カートに追加しました';
        } else {
            $message = 'カートに登録済です';
        }

        $my_carts = Cart::where('restaurant', $restaurant_id)->get();
        return view('restaurant.cart', [
            'message' => $message,
            'my_carts' => $my_carts,
        ]);
    }
}
