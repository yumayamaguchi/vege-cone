<?php

namespace App\Http\Controllers\Restaurant;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Restaurant;

class RestaurantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:restaurant')->except('logout');
    }


    //トップページ
    public function index()
    {
        return view('restaurant.index');
    }

    //飲食店のマイページ
    public function show(string $restaurant_name)
    {
        $restaurant = Restaurant::where('restaurant_name', $restaurant_name)->first();
        return view('restaurant.show', [
            'restaurant' => $restaurant,
        ]);
    }

    //商品詳細表示
    // public function show(Restaurant $restaurant)
    // {
    //     return view('restaurant.show', ['restaurant' => $restaurant]);
    // }
}
