@extends('restaurants.layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="restaurants--list" style="background: #c6e0f5;">
            @foreach ($restaurants as $restaurant)
                <div style="margin: 20px; background: #ffffff">
                    <h1>Title: {{ $restaurant->title }}</h1>
                    <h2>Description: {{ $restaurant->description }}</h2>
                    <h3>Address: {{ $restaurant->address }}</h3>
                    <h4>Id: {{ $restaurant->id }}</h4>
                    <p>User: {{ $restaurant->restaurateur->user }}</p>
                    <p>Services: {{ $restaurant->services }}</p>
                    <p>Kitchens: {{ $restaurant->kitchens }}</p>
                    <p>products: {{ $restaurant->products }}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection