@extends('app')

@section('title', '飲食店トップページ')


@section('content')
    @include('restaurant_nav')
    {{-- メインビジュアルここから --}}
    <div class="main_visual">
        <h1>市場に出せなかった野菜で<br>生産者と飲食店をコネクト</h1>
        <div class="inner">
            <h6>生産者の方はこちら</h6>
            <a href="{{ route('register') }}" class="btn btn-warning">新規登録</a>
        </div>
        <div class="inner">
            <h6>飲食店の方はこちら</h6>
            <a href="{{ route('restaurant.register') }}" class="btn btn-info">新規登録</a>
        </div>
    </div>
    {{-- メインビジュアルここまで --}}
    {{-- asideここから --}}
    <aside class="sub_visual mt-100">
        <div class="box">
            <h6>カテゴリー</h6>
            <li>
                <a href="">
                    <img src="{{ asset('storage/image/potato.jpeg') }}" alt="potato" width="30px" height="30px">じゃがいも
                </a>
            </li>
            <li>
                <a href="">
                    <img src="{{ asset('storage/image/onion.jpeg') }}" alt="potato" width="30px" height="30px">玉ねぎ
                </a>
            </li>
            <li>
                <a href="">
                    <img src="{{ asset('storage/image/chinese_cabbage.jpeg') }}" alt="potato" width="30px"
                        height="30px">キャベツ
                </a>
            </li>
            <li>
                <a href="">
                    <img src="{{ asset('storage/image/radish.jpeg') }}" alt="potato" width="30px" height="30px">大根
                </a>
            </li>
            <li>
                <a href="">
                    <img src="{{ asset('storage/image/tomato.jpeg') }}" alt="potato" width="30px" height="30px">トマト
                </a>
            </li>
            <li>
                <a href="">
                    <img src="{{ asset('storage/image/pumpkin.jpeg') }}" alt="potato" width="30px" height="30px">かぼちゃ
                </a>
            </li>
            <li>
                <a href="">
                    <img src="{{ asset('storage/image/okura.jpeg') }}" alt="potato" width="30px" height="30px">オクラ
                </a>
            </li>
        </div>
        <div class="box box_1">
            <li><a href="{{ route('products.create') }}">投稿する<i class="fas fa-chevron-right arrow"></i></a></li>
            <li><a href="{{ route('users.list') }}">生産者一覧<i class="fas fa-chevron-right arrow"></i></a></li>
        </div>
    </aside>

    {{-- asideここまで --}}
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
