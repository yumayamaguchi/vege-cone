@extends('app')

@section('title', 'トップページ')


@section('content')
    @include('nav')
    {{-- メインビジュアルここから --}}
    <div class="main_visual">

        <h1>市場に出せなかった野菜で<br>生産者と飲食店をコネクト</h1>
        @guest
            <div class="inner">
                <h6>生産者の方はこちら</h6>
                <a href="{{ route('register') }}" class="btn btn-warning">新規登録</a>
            </div>
            <div class="inner">
                <h6>飲食店の方はこちら</h6>
                <a href="{{ route('restaurant.register') }}" class="btn btn-info">新規登録</a>
            </div>
        @endguest
        @auth
            <h2>かんたん3ステップ</h2>
            <div class="d-flex justify-content-center">
                <div class="p-4 step">
                    <div class="logo"><i class="far fa-hand-point-up"></i></div>
                    <p>投稿するボタンクリック</p>
                </div>
                <div class="p-4 logo_1"><i class="fas fa-angle-double-right"></i></div>
                <div class="p-4 step">
                    <div class="logo"><i class="fas fa-edit"></i></div>
                    <p>必要事項入力</p>
                </div>
                <div class="p-4 logo_1"><i class="fas fa-angle-double-right"></i></div>
                <div class="p-4 step">
                    <div class="logo"><i class="fas fa-cloud-upload-alt"></i></div>
                    <p>出品する</p>
                </div>
            </div>
        @endauth
    </div>
    {{-- メインビジュアルここまで --}}

    @include('category')

    {{-- 商品一覧ここから --}}
    <div class="sub_visual_1">
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
    </div>

    {{-- 商品一覧ここまで --}}
    @include('footer')
@endsection
