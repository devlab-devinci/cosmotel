@extends('restaurants.layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="restaurants--list">
            @foreach ($restaurants as $restaurant)
                <div style="margin: 20px">
                    <p>{{ $restaurant->title }}</p>
                    <p>{{ $restaurant->description }}</p>
                    <p>{{ $restaurant->address }}</p>
                    <p>{{ $restaurant->id }}</p>
                    <p>{{ $restaurant->restaurateur->user->firstname }}</p>
                    <p>{{ $restaurant->services }}</p>
                    <p>{{ $restaurant->kitchens }}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection