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

        //合計金額の表示
        $total_price = $cart->totalCart();

        return view('restaurant.cart', compact('my_carts', 'total_price'));
    }

    //カートの追加処理
    public function add(Request $request, Cart $cart)
    {
        //カートに追加処理
        $product_id = $request->product_id;
        $quantity = $request->quantity;
        $message = $cart->addCart($product_id, $quantity);

        //追加後の情報取得
        $my_carts = $cart->showCart();
        $total_price = $cart->totalCart();

        return view('restaurant.cart', compact('my_carts', 'message', 'total_price'));
    }

    //カートの削除処理
    public function delete(Request $request, Cart $cart)
    {
        $product_id = $request->product_id;
        $message = $cart->deleteCart($product_id);

        //追加後の情報取得
        $my_carts = $cart->showCart();
        $total_price = $cart->totalCart();

        return view('restaurant.cart', compact('my_carts', 'message', 'total_price'));
    }

    public function checkout(Cart $cart)
    {
        //ユーザーIDと一致するrestaurant_idの情報取得
        $my_carts = $cart->showCart();
        $carts = [];
        foreach ($my_carts as $my_cart) {
            $cart = [
                'name' => $my_cart->product->name,
                'description' => $my_cart->product->introduction,
                'amount' => $my_cart->product->price,
                'quantity' => $my_cart->quantity,
                'currency'    => 'jpy',
            ];
            array_push($carts, $cart);
        }

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items'           => [$carts],
            'success_url'          => route('restaurant.success'),
            'cancel_url'           => route('restaurant.cart'),
        ]);

        return view('restaurant.checkout', [
            'session' => $session,
            'publicKey' => env('STRIPE_PUBLIC_KEY')
        ]);
    }

    public function success()
    {
        $restaurant_id = Auth('restaurant')->id();
        Cart::where('restaurant_id', $restaurant_id)->delete();

        return redirect(route('restaurant.index'));
    }
}
