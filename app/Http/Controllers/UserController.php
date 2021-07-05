<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Purchased_Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //マイページ表示処理
    public function show()
    {
        $id = Auth::id();
        $user = User::where('id', $id)->first();
        $products = Product::where('user_id', $user->id)->orderBy('created_at', 'asc')->paginate(3);

        return view('users.show', [
            'user' => $user,
            'products' => $products,
        ]);
    }

    //生産者一覧処理
    public function list()
    {
        //userとpurchased_productsを結合
        $sums = User::leftJoin('purchased_products', 'users.id', '=', 'purchased_products.user_id')->groupBy('user_id')->selectRaw("user_id, sum(quantity),min(users.created_at) as created_time")->orderBy('created_time', 'asc')->get();


        $lists = User::orderBy('created_at', 'asc')->paginate(6);
        //購入済み商品の数量の合計
        // $sum = Purchased_Product::whereHas('product', function ($query) {
        //     $query->where('user_id', $lists->user_id);
        // })->sum('quantity');
        // dd($sum);

        return view('users.list', [
            'lists' => $lists,
            'sums' => $sums,
        ]);
    }

    //生産者詳細
    public function detail(string $producer_name)
    {
        $user = User::where('producer_name', $producer_name)->first();
        $products = $user->products->sortByDesc('created_at');

        return view('users.detail', [
            'user' => $user,
            'products' => $products,
        ]);
    }

    //マイページ更新画面表示
    public function getEdit()
    {
        $id = Auth::id();
        $user = User::where('id', $id)->first();

        return view('users.edit', [
            'user' => $user,
        ]);
    }

    //マイページ更新処理
    public function postEdit(Request $request)
    {
        $id = Auth::id();
        //バリデーション
        $this->validate($request, User::$editRules);

        $auth = User::where('id', $id)->first();
        $form = $request->all();
        $form['password'] = Hash::make($form['password']);

        if (request()->hasFile('image')) {
            $image = request()->file('image')->hashName();
            request()->file('image')->store('/public/image');
            //'image' => $image の代入
            $form['image'] = $image;
        };

        $auth->fill($form)->save();
        return redirect()->route('users.edit');
    }
}
