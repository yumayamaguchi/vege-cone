<?php

namespace App\Http\Controllers\Restaurant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Cart;
use App\Restaurant;
use App\Purchased_Product;


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

        \Stripe\Stripe::setApiKey(config('app.stripe_secret_key'));

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items'           => [$carts],
            'success_url'          => route('restaurant.success'),
            'cancel_url'           => route('restaurant.cart'),
        ]);

        return view('restaurant.checkout', [
            'session' => $session,
            'publicKey' => config('app.stripe_public_key')
        ]);
    }

    //購入した場合の処理
    public function success()
    {

        $restaurant_id = Auth('restaurant')->id();
        $my_carts = Cart::where('restaurant_id', $restaurant_id)->with('product')->get();
        foreach($my_carts as $my_cart) {
        Purchased_Product::create([
            'product_id' => $my_cart->product_id,
            'user_id' => $my_cart->product->user_id,
            'quantity' => $my_cart->quantity,
        ]);
    };

        Cart::where('restaurant_id', $restaurant_id)->delete();

        return redirect()->route('restaurant.index')->with('flash_message', ' 決済が完了しました');
    }
}
