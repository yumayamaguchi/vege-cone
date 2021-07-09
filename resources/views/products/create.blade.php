@extends('app')

@section('title', '記事投稿')

@include('nav')

@section('content')
<h1 class="text-center mt-100">商品投稿ページ</h1>
<div class="container">
  <div class="row">
    <div class="col-12">
      @include('error_card_list')
      <div class="card mt-3">
        <div class="card-body pt-0">
          <div class="card-text">
            <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
              @include('products.form')
              <button type="submit" class="btn btn-block btn-outline-primary" data-mdb-ripple-color="dark">投稿する</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('footer')
@endsection
