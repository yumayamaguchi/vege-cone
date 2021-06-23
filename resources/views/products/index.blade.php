@extends('app')

@section('title', 'トップページ')


@section('content')
    @include('nav')
    {{-- メインビジュアルここから --}}
    <div class="main_visual">
        <h1>市場に出せなかった野菜で<br>生産者と飲食店をコネクト</h1>
        <div class="inner">
            <h6>生産者の方はこちら</h6>
            <a href="" class="btn btn-warning">新規登録</a>
        </div>
        <div class="inner">
            <h6>飲食店の方はこちら</h6>
            <a href="" class="btn btn-info">新規登録</a>
        </div>
    </div>
    {{-- メインビジュアルここまで --}}
    {{-- asideここから --}}
    <aside class="sub_visual">
        <div class="box">
            <a href="">投稿する</a>
        </div>
        <div class="box">
            <a href="">生産者一覧</a>
        </div>
    </aside>

    {{-- asideここまで --}}
    {{-- 商品一覧ここから --}}
    <div class="row">
        @foreach ($products as $product)
        <div class="col-sm-4 mt-100">
            <div class="card h-100">
                <img src="{{ asset($product->image) }}" class="card-img-top" alt="" />
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">
                        {{ $product->introduction }}
                    </p>
                    <a href="#!" class="btn btn-primary">Button</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{-- 商品一覧ここまで --}}
    @include('footer')
@endsection
