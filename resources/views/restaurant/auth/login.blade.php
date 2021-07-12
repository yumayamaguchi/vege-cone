@extends('app')

@section('title', 'ログイン')

@section('content')
    @include('nav')
    <div class="mt-100">
        <h1 class="text-center">飲食店ログインページ</h1>
    </div>
    <div class="card mw-1000 center mt-5">
        <div class="card-body text-center">
            <h2 class="card-title text-center">ログイン</h2>
            @include('error_card_list')
            <div class="card-text">
                <form method="POST" action="{{ route('restaurant.login') }}">
                    @csrf
                    <div class="md-form">
                        <label for="email">メールアドレス</label>
                        <input class="form-control" type="text" id="email" name="email" required
                            value="{{ old('email') }}">
                    </div>
                    <div class="md-form">
                        <label for="password">パスワード</label>
                        <input class="form-control" type="password" id="password" name="password" required>
                    </div>
                    <input type="hidden" name="remember" id="remember" value="on">
                    <button class="btn btn-block btn-outline-primary" data-mdb-ripple-color="dark" type="submit">ログイン</button>
                </form>
                <div class="mt-2">
                    <a href="{{ route('restaurant.register') }}" class="card-text">ユーザー登録はこちら</a>
                </div>
                <div class="mt-2">
                    <a href="{{ route('restaurant.login.guest') }}" class="card-text">ゲストユーザーとしてログイン</a>
                </div>
            </div>
        </div>
    </div>
    @include('footer')
@endsection
