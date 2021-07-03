<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;

class UserController extends Controller
{
    //マイページ表示処理
    public function show($producer_name)
    {
        $user = User::where('producer_name', $producer_name)->first();
        $products = Product::where('user_id', $user->id)->orderBy('created_at', 'asc')->paginate(3);

        return view('users.show', [
            'user' => $user,
            'products' => $products,
        ]);
    }

    //生産者一覧処理
    public function list()
    {
        $list = User::get();

        return view('users.list', ['list' => $list]);
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
    public function getEdit(string $producer_name)
    {
        $user = User::where('producer_name', $producer_name)->first();

        return view('users.edit', [
            'user' => $user,
        ]);
    }

    //マイページ更新処理
    public function postEdit(Request $request, string $producer_name)
    {
        $auth = User::where('producer_name', $producer_name)->first();

        $auth->fill($request->validated())->save();
        return redirect()->route('users.edit', [
            'producer_name' => $producer_name,
        ]);
    }
}
