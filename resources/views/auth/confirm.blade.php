@extends('app')

@section('title', '生産者ユーザー登録確認')

@section('content')
    @include('nav')

    <div>
        <h1 class="text-center mt-100">生産者情報登録確認ページ</h1>
    </div>
    <div class="card mw-1000 center mt-5">
        <div class="card-body text-center">
            @include('error_card_list')
            <div class="card-text">
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    <table class="table table-striped confirm">
                        <tbody>
                            <tr>
                                <th>＜生産者名＞</th>
                                <td>{{ $confirm['producer_name'] }}</td>
                                <input class="form-control" type="hidden" id="producer_name" name="producer_name" required
                                    value="{{ $confirm['producer_name'] }}">
                            </tr>
                            <tr>
                                <th>＜担当者名＞</th>
                                <td>{{ $confirm['name'] }}</td>
                                <input class="form-control" type="hidden" id="name" name="name" required
                                    value="{{ $confirm['name'] }}">
                            </tr>
                            <tr>
                                <th>＜紹介文＞</th>
                                <td>{{ $confirm['introduction'] }}</td>
                                <input class="form-control" type="hidden" id="name" name="introduction" required
                                    value="{{ $confirm['introduction'] }}">
                            </tr>

                            <tr>
                                <th>＜住所＞</th>
                                <td>{{ $confirm['address'] }}</td>
                                <input class="form-control" type="hidden" id="address" name="address" required
                                    value="{{ $confirm['address'] }}">
                            </tr>

                            <tr>
                                <th>＜メール＞</th>
                                <td>{{ $confirm['email'] }}</td>
                                <input class="form-control" type="hidden" id="email" name="email" required
                                    value="{{ $confirm['email'] }}">
                            </tr>
                            <tr>
                                <th>＜パスワード＞</th>
                                <td>表示なし</td>
                                <input class="form-control" type="hidden" id="password" name="password" required
                                    value="">
                            </tr>

                            <tr>
                                <th>＜紹介画像＞</th>
                                <td><img src="{{ asset('storage/image/' . $confirm['image']) }}" width="200px" height="200px">
                                </td>
                                <input class="form-control-file" type="hidden" id="image" name="image" value="{{ $confirm['image'] }}">
                            </tr>
                        </tbody>
                    </table>

                    <button class="btn btn-block btn-outline-primary" data-mdb-ripple-color="dark"
                        type="submit">生産者情報登録</button>
                    <button class="btn btn-block btn-outline-warning mt-5" data-mdb-ripple-color="dark" name="back"
                        type="submit">書き直す</button>
                </form>
            </div>
        </div>
    </div>

    @include('footer')

@endsection
