@extends('restaurants.layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="restaurants--list">
            @foreach ($restaurants as $restaurant)
                <div style="margin: 20px">
                    <p>{{ $restaurant->titre }}</p>
                    <p>{{ $restaurant->description }}</p>
                    <p>{{ $restaurant->adresse }}</p>
                    <p>{{ $restaurant->id }}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection