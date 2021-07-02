@extends('app')

@section('title', '詳細画面')

@section('content')
    @include('nav')
    <div class="mw-1000 center">
        <div class="text-center mt-100">
            <div class="show h-100">
                <a href="{{ route('products.show', ['product' => $product]) }}">
                    @if (!empty($product->image))
                        <img src="{{ asset('storage/image/' . $product->image) }}" class="" alt="" width="800px"
                            height="500px" />
                    @else
                        <img src="{{ asset('image/no-image.jpg') }}" class="" alt="" width="200px" height="250px" />
                    @endif
                </a>
                <table>
                    <tbody>
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
                @auth('restaurant')
                <form method="POST" action="{{ route('restaurant.add') }}">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}"/>
                    <div class="product__quantity">
                        <label>数量(キロ)</label>
                        <input type="number" name="quantity" value="数量(キロ)" require/>
                    </div>
                    <div class="product__btn-add-cart mt-50">
                        <button class="btn btn-block btn-outline-primary same-width" data-mdb-ripple-color="dark" type="submit">
                            <i class="fas fa-shopping-cart"></i>カートに入れる</button>
                    </div>
                </form>
                @endauth
            </div>
        </div>
    </div>

    </div>
    @include('footer')
@endsection
