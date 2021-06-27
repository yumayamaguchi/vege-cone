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
        $this->middleware('auth')->except('logout');
    }


    //トップページ
    public function index()
    {
        return view('restaurant.index');
    }

    //商品詳細表示
    // public function show(Restaurant $restaurant)
    // {
    //     return view('restaurant.show', ['restaurant' => $restaurant]);
    // }
}
