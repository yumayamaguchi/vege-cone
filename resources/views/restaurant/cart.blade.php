@extends('app')

@section('title', 'カート')

@section('content')
    @include('restaurant_nav')
    <div class="container">
        <div class="mt-100">
            <h1 class="text-center">{{ Auth('restaurant')->user()->restaurant_name }}様のカート</h1>
            <p class="text-center mt-5">{{ $message ?? '' }}</p>
        </div>
        @if (count($my_carts) > 0)
            <div class="cart-wrapper mt-100">
                @foreach ($my_carts as $my_cart)
                    <div class="card mb-3 mt-5">
                        <div class="row">
                            <img src="{{ asset('storage/image/' . $my_cart->product->image) }}"
                                alt="{{ $my_cart->product->name }}" class="product-cart-img" height="250px" width="250px">
                            <div class="card-body row mt-5">
                                <div class="col-md">
                                    商品名：{{ $my_cart->product->name }}
                                </div>
                                <div class="col-md">
                                    数量：{{ $my_cart->quantity }}キロ
                                </div>
                                <div class="col-md">
                                    金額：￥{{ number_format($my_cart->product->price * $my_cart->quantity) }}
                                </div>
                                {{-- 削除処理 --}}
                                <form method="post" action="{{ route('restaurant.delete') }}">
                                    @csrf
                                    <div class="card__btn-trash col-1">
                                        <input type="hidden" name="product_id" value="{{ $my_cart->product->id }}">
                                        <button type="submit" class="fas fa-trash-alt btn"></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="cart__sub-total">
                    <p>小計：￥{{ number_format($total_price) }}</p>
                </div>
                <div class="text-center mt-5">
                    <button onClick="location.href='{{ route('restaurant.checkout') }}'"
                    class="btn btn-block btn-outline-primary" data-mdb-ripple-color="dark">
                        購入する
                    </button>
                </div>
            </div>
        @else
            <div class="mt-5 text-center">
                <p>カートに商品が入っていません。</p>
            </div>
        @endif
        <div class="mt-5 text-center">
            <p>テスト用クレジットカードの情報は<a href="https://stripe.com/docs/testing#cards" target="_blank" rel="noopener noreferrer">こちら</a>をご参照ください。</p>
        </div>
    </div>
    @include('footer')
@endsection
