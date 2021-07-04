<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Purchased_Product;

class UserController extends Controller
{
    //マイページ表示処理
    public function show($id)
    {
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
        $lists = User::orderBy('created_at', 'asc')->paginate(6);
        //購入済み商品の数量の合計
        // $sum = Purchased_Product::whereHas('product', function ($query) {
        //     $query->where('user_id', $lists->user_id);
        // })->sum('quantity');
        // dd($sum);

        return view('users.list', [
            'lists' => $lists,
            // 'sum' => $sum,
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
    public function getEdit(string $id)
    {
        $user = User::where('id', $id)->first();

        return view('users.edit', [
            'user' => $user,
        ]);
    }

    //マイページ更新処理
    public function postEdit(Request $request, string $id)
    {
        // dd($id);
        $auth = User::find('id', $id)->first();


        $auth->fill($request->all())->save();
        return redirect()->route('users.edit', [
            'id' => $id,
        ]);
    }
}
