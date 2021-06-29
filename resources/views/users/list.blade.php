@extends('app')

@section('title', '生産者一覧')


@section('content')
    @include('nav')
    <h1 class="text-center mt-100">生産者一覧</h1>
    <div class="container">
        <div class="row">
            @foreach ($list as $lists)
                <div class="col-sm-4 mt-100">
                    <div class="card h-100">
                        <a href="{{ route('users.detail', ['producer_name' => $lists->producer_name]) }}">
                            <img src="{{ asset('storage/image/' . $lists->image) }}" class="card-img-top" alt=""
                                width="200px" height="250px" />
                            <div class="card-body">
                                <h5 class="card-title">{{ $lists->producer_name }}</h5>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @include('footer')
@endsection
