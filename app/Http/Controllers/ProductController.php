<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductRequest;

use App\Product;

class ProductController extends Controller
{
    //ポリシー使用
    public function __construct()
    {
        $this->authorizeResource(Product::class, 'product');
    }

    //トップページ
    public function index(Request $request)
    {
        $products = Product::orderBy('created_at', 'asc')->paginate(6);
        return view('products.index',[
            'products' => $products,
        ]);
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

    //商品更新画面表示
    public function edit(Product $product)
    {
        return view('products.edit',['product' => $product]);
    }

    //商品更新処理
    public function update(ProductRequest $request, Product $product)
    {
        if ($request->hasFile('image')) {
            $request->file('image')->store('/public/image');

            $product->fill($request->all());
            $product->image = $request->file('image')->hashName();
        } else {
            $product->fill($request->all());
        }
        $product->save();
        return redirect()->route('products.index');
    }

    //削除処理
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }

    //商品詳細表示
    public function show(Product $product)
    {
        return view('products.show', ['product' => $product]);
    }

    //カテゴリー別商品一覧表示
    public function category_show($category_number)
    {
        $category_products = Product::where('category_number', $category_number)->get();

        return view('products.category_show', compact('category_products'));
    }
}
