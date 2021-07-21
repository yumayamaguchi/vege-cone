@extends('app')

@section('title', $restaurant->restaurant_name)

@section('content')
    @include('restaurant_nav')

    {{-- フラッシュメッセージ --}}
    @if (isset($message))
        <div class="flash_message btn-success text-center py-3 my-0 mb30">
            <i class="fas fa-check"></i>{{ $message }}
        </div>
    @endif

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
                <div class="cart-wrapper mt-100">
                    @foreach ($favorites as $favorite)
                        <a class="favorite_list" href="{{ route('products.show', ['product' => $favorite->product_id]) }}">
                            <div class="card mb-3 mt-5">
                                <div class="row">
                                    <div class="col-md">
                                        <img src="{{ asset('storage/image/' . $favorite->product->image) }}"
                                            alt="{{ $favorite->product->name }}" class="product-cart-img" height="200px"
                                            width="200px">
                                    </div>
                                    <div class="card-body row mt-5">
                                        <div class="col-md">
                                            商品名：{{ $favorite->product->name }}
                                        </div>

                                        <div class="col-md">
                                            金額：￥{{ number_format($favorite->product->price) }}
                                        </div>
                                        {{-- 削除処理 --}}
                                        <form method="post" action="{{ route('restaurant.favorite.delete') }}">
                                            @csrf
                                            <div class="card__btn-trash col-1">
                                                <input type="hidden" name="product_id"
                                                    value="{{ $favorite->product->id }}">
                                                <button type="submit" class="fas fa-trash-alt btn"></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="mt-5 center">
                    {{ $favorites->links() }}
                </div>
            </div>
            <div class="tab-pane fade" id="item2" role="tabpanel" aria-labelledby="item2-tab">
                <div class="information">
                    <div class="my_image">
                        @if (!empty($restaurant->image))
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
                        <a href="{{ route('restaurant.edit') }}" class="btn btn-block btn-outline-primary"
                            data-mdb-ripple-color="dark">登録情報を更新する</a>
                    </div>

                    {{-- 削除機能 --}}
                    <div class="mt-3">
                        <button type="button" class="btn btn-block btn-outline-danger" data-toggle="modal"
                            data-target="#modal1">
                            登録情報を削除する
                        </button>
                        <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="label1"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body text-center">
                                        登録情報を削除します、よろしいですか？
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <a class="btn btn-outline-grey" data-dismiss="modal">
                                            キャンセル
                                        </a>
                                        <a href="{{ route('restaurant.user.delete') }}" class="btn btn-danger">削除する</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @include('footer')
@endsection
