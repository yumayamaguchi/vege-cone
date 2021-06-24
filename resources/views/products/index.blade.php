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
    <aside class="sub_visual mt-100">
        <div class="box">
            <a href="{{ route('products.create') }}">投稿する</a>
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
                    @if(!empty($product->image))
                    <a href=""><img src="{{ asset('storage/image/'.$product->image) }}" class="card-img-top" alt="" width="200px" height="250px" /></a>
                    @else
                    <a href=""><img src="{{ asset('image/no-image.jpg') }}" class="card-img-top" alt="" width="200px" height="250px" /></a>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">
                            {{ $product->introduction }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{-- 商品一覧ここまで --}}
    @include('footer')
@endsection
