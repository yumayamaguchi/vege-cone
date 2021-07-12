@extends('app')

@section('title', '生産者一覧')


@section('content')
    @if (Auth::check())
        @include('nav')
    @elseif(Auth('restaurant')->check())
        @include('restaurant_nav')
    @else
        @include('nav')
    @endif
    <h1 class="text-center mt-100">生産者一覧</h1>
    <div class="container">
        <div class="row">
            @foreach ($lists as $list)
                <div class="col-sm-4 mt-100">
                    <div class="card h-100">
                        <a href="{{ route('users.detail', ['id' => $list->id]) }}">
                            <img src="{{ asset('storage/image/' . $list->image) }}" class="card-img-top"
                                alt="{{ $list->producer_name }}" width="200px" height="250px" />
                            <div class="card-body">
                                <h5 class="card-title">{{ $list->producer_name }}</h5>
                                {{-- $sumsの内容を表示 --}}
                                <div class="point">
                                    <img src="{{ asset('/image/SDGs.jpg') }}" width="25px" height="25px">
                                    <span>廃棄ロス貢献度</span>
                                    @if($list->sum > 0)
                                    <span>{{ $list->sum }}P</span>
                                    @else
                                    <span>0P</span>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="mt-5 center">
                {{ $lists->links() }}
            </div>
        </div>
    </div>
    @include('footer')
@endsection
