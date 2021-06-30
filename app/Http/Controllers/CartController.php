<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;


class CartController extends Controller
{
    public function index()
    {
        $my_cart = Cart::all();
        return view('cart.index',[
            'my_carts' => $my_cart,
        ]);
    }
}
