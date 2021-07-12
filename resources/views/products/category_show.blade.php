@extends('app')

@section('title', '商品一覧')


@section('content')
    @if (Auth::check())
        @include('nav')
    @elseif(Auth('restaurant')->check())
        @include('restaurant_nav')
    @else
        @include('nav')
    @endif
    <h1 class="text-center mt-100">カテゴリー別商品一覧</h1>
    <div class="container">
        <div class="row">
            @foreach ($category_products as $category_product)
                <div class="col-sm-4 mt-100">
                    <div class="card h-100">
                        <a href="{{ route('products.show', ['product' => $category_product->id]) }}">
                            @if (!empty($category_product->image))
                                <img src="{{ asset('storage/image/' . $category_product->image) }}" class="card-img-top"
                                    alt="" width="200px" height="250px" />
                            @else
                                <img src="{{ asset('image/no-image.jpg') }}" class="card-img-top" alt="" width="200px"
                                    height="250px" />
                            @endif
                            <div class="card-body">

                                {{-- usersテーブルのidがproductsテーブルのuser_idに一致したら表示 --}}
                                @if (Auth('web')->id() === $category_product->user_id)
                                    {{-- ドロップダウン --}}
                                    <div class="ml-auto card-text exit">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <button type="button" class="btn btn-link text-muted m-0 p-2">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item"
                                                    href="{{ route('products.edit', ['product' => $category_product]) }}">
                                                    <i class="fas fa-pen mr-1"></i>記事を更新する
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item text-danger" data-toggle="modal"
                                                    data-target="#modal-delete-{{ $category_product->id }}">
                                                    <i class="fas fa-trash-alt mr-1"></i>記事を削除する
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- ドロップダウンここまで --}}

                                    {{-- modal --}}
                                    <div id="modal-delete-{{ $category_product->id }}" class="modal fade" tabindex="-1"
                                        role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="閉じる">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST"
                                                    action="{{ route('products.destroy', ['product' => $category_product]) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-body">
                                                        {{ $category_product->name }}を削除します。よろしいですか？
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
                                                        <button type="submit" class="btn btn-danger">削除する</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- modalここまで --}}
                                @endif
                                <h5 class="card-title product-title">{{ $category_product->name }}</h5>
                                <div class="card-text product-text">
                                    <p>{{ $category_product->introduction }}</p>
                                    <p>{{ $category_product->price }}円(税込)</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    @include('footer')
@endsection
