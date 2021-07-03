@extends('app')

@section('title', $restaurant->restaurant_name)

@section('content')
    @include('restaurant_nav')
    <div class="mt-100">
        <h1 class="text-center">マイページ</h1>
    </div>
    <div class="my_page mt-100">
        <ul class="nav nav-tabs nav-fill" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="item1-tab" data-toggle="tab" href="#item1" role="tab" aria-controls="item1"
                    aria-selected="true">お気に入り</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="item2-tab" data-toggle="tab" href="#item2" role="tab" aria-controls="item2"
                    aria-selected="false">登録情報</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="item1" role="tabpanel" aria-labelledby="item1-tab">
                <div class="row">
                    {{-- @foreach ($products as $product)
                        @include('products.card')
                    @endforeach --}}
                </div>
                <div class="row">
                    <div class="mt-5 center">
                        {{-- {{ $products->links() }} --}}
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="item2" role="tabpanel" aria-labelledby="item2-tab">
                <div class="information">
                    <form method="POST" action="" enctype="multipart/form-data">
                        <div class="my_image">
                            @if (!empty($user->image))
                                <img class="mw-1000" src="{{ asset('storage/image/' . $restaurant->image) }}" width="300px"
                                    height="300px" alt="">
                            @else
                                <img class="mw-1000" src="{{ asset('image/no-image.jpg') }}" alt="">
                            @endif
                        </div>
                        <ul>
                            <li>生産者名：{{ $restaurant->restaurant_name }}</li>
                            <li>担当者名：{{ $restaurant->name }}</li>
                            <li>紹介文：{{ $restaurant->introduction }}</li>
                            <li>住所：{{ $restaurant->address }}</li>
                            <li>メールアドレス：{{ $restaurant->email }}</li>
                        </ul>
                        <div class="mt-100">
                            <a href=""
                                class="btn btn-block btn-outline-primary" data-mdb-ripple-color="dark">登録情報を更新する</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('footer')
    @endsection
