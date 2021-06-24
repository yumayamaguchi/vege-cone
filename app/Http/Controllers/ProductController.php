<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductRequest;

use App\Product;

class ProductController extends Controller
{
    //トップページ
    public function index()
    {
        return view('products.index')
            ->with('products', Product::get());
    }

    // 投稿画面表示処理
    public function create()
    {
        return view('products.create');
    }

    //投稿をDBに登録する処理
    public function store(ProductRequest $request, Product $product)
    {
        //画像が添付されている場合とされていない場合
        if ($request->hasFile('image')) {
            $request->file('image')->store('/public/image');

            $product->fill($request->all());
            $product->image = $request->file('image')->hashName();
            $product->user_id = $request->user()->id;
        } else {
            $product->fill($request->all());
            $product->user_id = $request->user()->id;
        }
        $product->save();
        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {
        return view('products.edit',['product' => $product]);
    }
}
