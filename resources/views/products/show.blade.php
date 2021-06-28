@extends('app')

@section('title', '詳細画面')

@section('content')
    @include('nav')
    <div class="container">
        @include('products.card')
    </div>
    @include('footer')
@endsection
