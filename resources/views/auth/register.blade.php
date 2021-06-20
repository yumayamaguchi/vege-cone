@extends('app')

@section('title', '生産者ユーザー登録')

@section('content')

    <div>
        <h1 class="text-center">生産者情報登録</h1>
    </div>
    <div class="card mw-1000 center">
        <div class="card-body text-center">
            <h2 class="card-title text-center">ユーザー登録</h2>
            @include('error_card_list')
            <div class="card-text">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    {{-- <div class="md-form">
                        <label for="producer">生産者名</label>
                        <input class="form-control" type="text" id="producer" name="producer" required
                            value="{{ old('producer') }}">
                    </div> --}}
                    <div class="md-form">
                        <label for="name">担当者名</label>
                        <input class="form-control" type="text" id="name" name="name" required value="{{ old('name') }}">
                    </div>
                    <div class="md-form">
                        <label for="email">メール</label>
                        <input class="form-control" type="text" id="email" name="email" required
                            value="{{ old('email') }}">
                    </div>
                    <div class="md-form">
                        <label for="password">パスワード</label>
                        <input class="form-control" type="password" id="password" name="password" required>
                    </div>
                    {{-- <div class="md-form">
                        <label for="introduction">紹介</label>
                        <input class="form-control" type="text" id="introduction" name="introduction" required
                            value="{{ old('introduction') }}">
                    </div>
                    <div class="md-form">
                        <label for="address">住所</label>
                        <input class="form-control" type="text" id="address" name="address" required
                            value="{{ old('address') }}">
                    </div> --}}
                    <button class="btn btn-block btn-warning" type="submit">生産者情報登録</button>
                </form>
            </div>
        </div>
    </div>

@endsection
