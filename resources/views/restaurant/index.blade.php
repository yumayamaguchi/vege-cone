@extends('app')

@section('title', '飲食店トップページ')


@section('content')
    @include('restaurant_nav')
    {{-- メインビジュアルここから --}}
    <div class="main_visual">
        <h1>市場に出せなかった野菜で<br>生産者と飲食店をコネクト</h1>
        <h2>\飲食店用ページ/</h2>
    </div>
    {{-- メインビジュアルここまで --}}
    {{-- asideここから --}}
    <aside class="sub_visual mt-100">
        <div class="box">
            <a href="{{ route('products.create') }}">投稿する</a>
        </div>
        <div class="box">
            <a href="{{ route('users.list') }}">生産者一覧</a>
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
