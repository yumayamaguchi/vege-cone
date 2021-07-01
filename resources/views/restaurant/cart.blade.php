@extends('app')

@section('title', 'カート')

@section('content')
    @include('restaurant_nav')
    <div class="container">
        <div class="cart_title">
            Shopping Cart
        </div>

        <div class="cart-wrapper">
            <h1>{{ $login_restaurant_name }}さんのカートの中身</h1>
            @foreach ($my_carts as $my_cart)
                <div class="card mb-3">
                    <div class="row">
                        {{-- <img src="{{ asset($my_cart->image) }}" alt="{{ $my_cart->name }}" class="product-cart-img" /> --}}
                        <div class="card-body">
                            <div class="card-product-name col-6">
                                {{ $my_cart->product_id }}
                            </div>
                            <div class="card-quantity col-2">
                                {{ $my_cart->product_id }}個
                            </div>
                            <div class="card__total-price col-3 text-center">
                                ￥{{ number_format($my_cart->product_id * $my_cart->product_id) }}
                            </div>

                            {{-- 削除処理 --}}
                            {{-- <form method="post" action="{{ route('line_item.delete') }}">
                                @csrf
                                <div class="card__btn-trash col-1">
                                    <input type="hidden" name="id" value="{{ $my_cart->pivot->id }}" />
                                    <button type="submit" class="fas fa-trash-alt btn"></button>
                                </div>
                            </form> --}}

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="cart__sub-total">

        </div>

        <div class="cart__empty">
            カートに商品が入っていません。
        </div>

    </div>
    @include('footer')

@endsection
