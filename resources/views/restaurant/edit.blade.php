@extends('app')

@section('title', '飲食店ユーザー登録')

@section('content')
    @include('restaurant_nav')

    <div>
        <h1 class="text-center mt-100">飲食店情報更新ページ</h1>
    </div>
    <div class="card mw-1000 center mt-5">
        <div class="card-body text-center">
            <h2 class="card-title text-center">ユーザー登録更新</h2>
            @include('error_card_list')

            {{--  ゲストログインの場合  --}}
            @if (Auth('restauant')->id() == 9)
                <p class="text-danger">※ゲストユーザーは、登録情報の編集できません。</p>
            @endif

            <div class="card-text">
                <form method="POST" action="{{ route('users.postEdit', ['producer_name' => $user->producer_name]) }}"
                    enctype="multipart/form-data">
                    @csrf

                    {{--  ゲストログインの場合、編集不可に設定  --}}
                    @if (Auth('restaurant')->id() == 9)
                        @include('restaurants.guest-edit-form')
                    @else
                        @include('restaurants.edit-form')
                    @endif


                    <button class="btn btn-block btn-outline-primary" data-mdb-ripple-color="dark"
                        type="submit">飲食店情報登録</button>
                </form>
            </div>
        </div>
    </div>

    @include('footer')

@endsection
