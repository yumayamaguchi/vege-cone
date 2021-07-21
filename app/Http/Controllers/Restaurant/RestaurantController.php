<?php

namespace App\Http\Controllers\Restaurant;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Restaurant;
use App\Product;
use App\User;
use App\Favorite;
use Illuminate\Support\Facades\Hash;


class RestaurantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:restaurant')->except('logout');
    }


    //トップページ
    public function index()
    {
        $products = Product::orderBy('created_at', 'DESC')->paginate(6);

        return view('restaurant.index', [
            'products' => $products,
        ]);
    }

    //飲食店のマイページ
    public function show()
    {
        $id = Auth('restaurant')->id();
        $restaurant = Restaurant::where('id', $id)->first();
        $favorites = Favorite::where('restaurant_id', $id)->paginate(2);
        return view('restaurant.show', [
            'restaurant' => $restaurant,
            'favorites' => $favorites,
        ]);
    }

    //マイページ更新画面
    public function getEdit()
    {
        $id = Auth('restaurant')->id();
        $restaurant = Restaurant::where('id', $id)->first();

        return view('restaurant.edit', [
            'restaurant' => $restaurant,
        ]);
    }

    //マイページ更新処理
    public function postEdit(Request $request)
    {
        $id = Auth('restaurant')->id();
        //バリデーション
        $this->validate($request, Restaurant::$editRules);

        $auth = Restaurant::where('id', $id)->first();
        $form = $request->all();
        $form['password'] = Hash::make($form['password']);

        if (request()->hasFile('image')) {
            $image = request()->file('image')->hashName();
            request()->file('image')->store('/public/image');
            //'image' => $image の代入
            $form['image'] = $image;
        };

        $auth->fill($form)->save();
        return redirect()->route('restaurant.edit');
    }

    //ユーザー削除機能
    public function delete()
    {
        $id = Auth('restaurant')->id();
        $auth = Restaurant::where('id', $id)->first();
        $auth->delete();
        return redirect()->route('products.index');
    }
}
