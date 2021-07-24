@extends('app')

@section('title', '生産者ユーザー登録確認')

@section('content')
@include('nav')

    <div>
        <h1 class="text-center mt-100">生産者情報登録確認ページ</h1>
    </div>
    <div class="card mw-1000 center mt-5">
        <div class="card-body text-center">
            <h2 class="card-title text-center">ユーザー登録</h2>
            @include('error_card_list')
            <div class="card-text">
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="md-form">
                        <label for="producer_name">生産者名</label>
                        {{ $input['producer_name'] }}
                        <input class="form-control" type="hidden" id="producer_name" name="producer_name" required
                            value="{{ $input['producer_name'] }}">
                    </div>
                    <div class="md-form">
                        <label for="name">担当者名</label>
                        <input class="form-control" type="hidden" id="name" name="name" required value="{{ $input['name'] }}">
                    </div>
                    <div class="md-form">
                        <label for="name">紹介文</label>
                        <input class="form-control" type="hidden" id="name" name="name" required value="{{ $input['introduction'] }}">
                    </div>

                    <div class="md-form">
                        <label for="address">住所</label>
                        <input class="form-control" type="text" id="address" name="address" required
                            value="{{ $input['address'] }}">
                    </div>

                    <div class="md-form">
                        <label for="email">メール</label>
                        <input class="form-control" type="text" id="email" name="email" required
                            value="{{ $input['email'] }}">
                    </div>
                    <div class="md-form">
                        <label for="password">パスワード</label>
                        <input class="form-control" type="hidden" id="password" name="password" required value="{{  $input['password'] }}">
                    </div>

                    <div class="introduction_image">
                        <label class="form-label" for="image">紹介画像</label>
                        <input class="form-control-file" type="hidden" id="image" name="image" value="{{ $input['image'] }}">
                    </div>

                    <button class="btn btn-block btn-outline-primary" data-mdb-ripple-color="dark" type="submit">生産者情報登録</button>
                </form>
            </div>
        </div>
    </div>

    @include('footer')

@endsection
