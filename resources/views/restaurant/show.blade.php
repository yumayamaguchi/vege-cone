@extends('app')

@section('title', $restaurant->restaurant_name)

@section('content')
    @include('restaurant_nav')
    <div class="center mw-1000">
        <h1>{{ $restaurant->restaurant_name }}</h1>
        <h3>{{ $restaurant->name }}</h3>
        <div>
            @if (!empty($restaurant->image))
                <img class="mw-1000" src="{{ asset('storage/image/' . $restaurant->image) }}" alt="">
            @else
                <img class="mw-1000" src="{{ asset('image/no-image.jpg') }}" alt="">
            @endif

        </div>
        <p>{{ $restaurant->introduction }}</p>
        <p>{{ $restaurant->address }}</p>
        <p>{{ $restaurant->email }}</p>
    </div>
@endsection
