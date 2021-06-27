@extends('app')

@section('title', $user->producer_name)

@section('content')
    @include('nav')
    <div class="center mw-1000">
        <h1>{{ $user->producer_name }}</h1>
        <h3>{{ $user->name }}</h3>
        <div>
            @if (!empty($user->image))
                <img class="mw-1000" src="{{ asset('storage/image/' . $user->image) }}" alt="">
            @else
                <img class="mw-1000" src="{{ asset('image/no-image.jpg') }}" alt="">
            @endif

        </div>
        <p>{{ $user->introduction }}</p>
        <p>{{ $user->address }}</p>
        <p>{{ $user->email }}</p>
    </div>
@endsection
