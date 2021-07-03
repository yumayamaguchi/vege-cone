@extends('app')

@section('title', '記事更新')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-body pt-0">
                        @include('error_card_list')
                        <div class="card-text">
                            <form method="POST" action="{{ route('products.update', ['product' => $product]) }}" enctype="multipart/form-data">

                                @include('products.form')
                                <button type="submit" class="btn btn-block btn-warning">更新する</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
