<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //マイページ表示処理
    public function show(string $producer_name)
    {
        $user = User::where('producer_name', $producer_name)->first();

        $products = $user->products->sortByDesc('created_at');

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

    //マイページ更新画面表示
    public function getEdit(string $producer_name)
    {
        $user = User::where('producer_name', $producer_name)->first();

        return view('users.edit', [
            'user' => $user,
        ]);
    }

    //マイページ更新処理
    public function postEdit($producer_name, Request $request)
    {
        $producer_name->fill($request->all())->save();
        return redirect()->route('users.edit', ['producer_name' => $producer_name]);

    }
}
