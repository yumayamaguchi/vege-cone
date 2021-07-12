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
        $lists = User::leftJoin('purchased_products', 'users.id', '=', 'purchased_products.user_id')
            ->groupBy('users.id')
            ->selectRaw("users.id, min(producer_name) as producer_name,sum(quantity) as sum, min(image) as image")->orderBy('sum', 'DESC')->paginate(6);

        return view('users.list', [
            'lists' => $lists
        ]);
    }

    //生産者詳細
    public function detail(string $id)
    {
        $user = User::where('id', $id)->first();
        $products = Product::where('user_id', $user->id)->orderBy('created_at', 'asc')->paginate(3);

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
