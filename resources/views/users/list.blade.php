@extends('app')

@section('title', '生産者一覧')


@section('content')
    @include('nav')
    <div class="container">
        <div class="row">
            @foreach ($list as $lists)
                <div class="col-sm-4 mt-100">
                    <div class="card h-100">
                        <a href="">
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
@endsection
