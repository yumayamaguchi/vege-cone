@extends('app')

@section('title', '詳細画面')

@section('content')
    @if (Auth::check())
        @include('nav')
    @elseif(Auth('restaurant')->check())
        @include('restaurant_nav')
    @else
        @include('nav')
    @endif

    {{-- フラッシュメッセージ --}}
    @if (isset($message))
        <div class="flash_message btn-success text-center py-3 my-0 mb30">
            <i class="fas fa-check"></i>{{ $message }}
        </div>
    @endif

    <div class="mt-100">
        <h1 class="text-center">商品詳細ページ</h1>
    </div>
    <div class="mw-1000 center">
        <div class="text-center mt-100">
            <div class="show h-100">
                <a href="{{ route('products.show', ['product' => $product->id]) }}">
                    @if (!empty($product->image))
                        <img src="{{ asset('storage/image/' . $product->image) }}" class="" alt="" width="800px"
                            height="500px" />
                    @else
                        <img src="{{ asset('image/no-image.jpg') }}" class="" alt="" width="200px" height="250px" />
                    @endif
                </a>
                <div class="container">
                    <div class="row">
                        <table class="col-md-8">
                            <tbody class="show-table">
                                <tr>
                                    <th>生産者名</th>
                                    <td>：{{ $product->user->producer_name }}</td>
                                </tr>
                                <tr>
                                    <th>商品名</th>
                                    <td>：{{ $product->name }}</td>
                                </tr>
                                <tr>
                                    <th>商品詳細</th>
                                    <td>：{{ $product->introduction }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="col-md-4">
                            <tbody class="show-table">
                                <tr>
                                    <th>販売量</th>
                                    <td>：{{ $product->amount }}キロ</td>
                                </tr>
                                <tr>
                                    <th>販売価格</th>
                                    <td>：{{ $product->price }}円</td>
                                </tr>
                                <tr>
                                    <th>産地</th>
                                    <td>：{{ $product->origin }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                @auth('restaurant')

                    <form method="POST" action="{{ route('restaurant.add') }}">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="product__quantity">
                            <label>数量(キロ)</label>
                            <input type="number" name="quantity" value="数量(キロ)" required>
                        </div>
                        <div class="product__btn-add-cart mt-50">
                            <button class="btn btn-block btn-outline-primary same-width" data-mdb-ripple-color="dark"
                                type="submit">
                                <i class="fas fa-shopping-cart"></i>カートに入れる</button>
                        </div>
                    </form>
                    <div class="mt-3">
                    <form method="POST" action="{{ route('restaurant.favorite.add') }}">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="">
                            <button type="submit" class="btn btn-outline-danger same-width" data-mdb-ripple-color="dark">
                                <i class="far fa-star"></i>お気に入りに追加</button>
                        </div>
                    </form>
                    </div>
                @endauth
            </div>
        </div>
    </div>

    </div>
    @include('footer')
@endsection
