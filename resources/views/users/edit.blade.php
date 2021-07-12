@extends('app')

@section('title', '生産者ユーザー情報更新')

@section('content')
    @include('nav')

    <div>
        <h1 class="text-center mt-100">生産者情報更新ページ</h1>
    </div>
    <div class="card mw-1000 center mt-5">
        <div class="card-body text-center">
            <h2 class="card-title text-center">ユーザー登録更新</h2>
            @include('error_card_list')

            {{--  ゲストログインの場合  --}}
            @if (Auth::id() == 1)
                <p class="text-danger">※ゲストユーザーは、登録情報の編集できません。</p>
            @endif

            <div class="card-text">
                <form method="POST" action="{{ route('users.postEdit') }}"
                    enctype="multipart/form-data">
                    @csrf

                    {{--  ゲストログインの場合、編集不可に設定  --}}
                    @if (Auth::id() == 1)
                        @include('users.guest-edit-form')
                    @else
                        @include('users.edit-form')
                    @endif


                    <button class="btn btn-block btn-outline-primary" data-mdb-ripple-color="dark"
                        type="submit">生産者情報登録</button>
                </form>
            </div>
        </div>
    </div>

    @include('footer')

@endsection
