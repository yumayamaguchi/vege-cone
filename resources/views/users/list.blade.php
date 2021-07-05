@extends('app')

@section('title', '生産者一覧')


@section('content')
    @include('nav')
    <h1 class="text-center mt-100">生産者一覧</h1>
    <div class="container">
        <div class="row">
            @foreach ($lists as $list)
                <div class="col-sm-4 mt-100">
                    <div class="card h-100">
                        <a href="{{ route('users.detail', ['producer_name' => $list->producer_name]) }}">
                            <img src="{{ asset('storage/image/' . $list->image) }}" class="card-img-top"
                                alt="{{ $list->producer_name }}" width="200px" height="250px" />
                            <div class="card-body">
                                <h5 class="card-title">{{ $list->producer_name }}</h5>
                                {{--  $sumsの内容を表示  --}}
                                <h5>{{ $sums->user_id[$list->id] }}</h5>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
            <div class="mt-5 center">
                {{ $lists->links() }}
            </div>
        </div>
    </div>
    @include('footer')
@endsection
