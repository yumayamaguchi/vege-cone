@extends('app')

@section('title', '飲食店トップページ')


@section('content')
    @include('restaurant_nav')
    {{-- メインビジュアルここから --}}
    <div class="main_visual">
        <h1>市場に出せなかった野菜で<br>生産者と飲食店をコネクト</h1>
        <h2>\かんたん3ステップ/</h2>
        <div class="d-flex justify-content-center">
            <div class="p-4 step r_step">
                <div class="logo"><i class="far fa-hand-point-up"></i></div>
                <p>商品を選択</p>
            </div>
            <div class="p-4 logo_1"><i class="fas fa-angle-double-right"></i></div>
            <div class="p-4 step r_step">
                <div class="logo"><i class="fas fa-cart-plus"></i></i></div>
                <p>カートに入れる</p>
            </div>
            <div class="p-4 logo_1"><i class="fas fa-angle-double-right"></i></div>
            <div class="p-4 step r_step">
                <div class="logo"><i class="fas fa-money-check-alt"></i></div>
                <p>購入手続き</p>
            </div>
        </div>
    </div>
    {{-- メインビジュアルここまで --}}

    @include('category')

    {{-- 商品一覧ここから --}}
    <div class="row">
        @foreach ($products as $product)
            @include('products.card')
        @endforeach
    </div>
    <div class="row">
        <div class="mt-5 center">
            {{ $products->links() }}
        </div>
    </div>
    {{-- 商品一覧ここまで --}}
    @include('footer')
@endsection
