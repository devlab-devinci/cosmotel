@extends('guest.layouts.home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-10">
                                {{ $restaurant->name }}
                            </div>
                            <div class="col-2">
                                {{ $restaurant->status }}
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @foreach($restaurant->images as $image)
                            <img class="img-thumbnail m-2" src="{{ URL::to('/') }}/{{ $image->src }}">
                        @endforeach
                    </div>

                    <div class="card-body">
                        <a href="{{ route('restaurateur.restaurant::edit', $restaurant->id) }}">Edit basic</a>
                    </div>

                    <div class="card-body">
                        <div class="card-subtitle">Description :</div>
                        <div class="card-title">{{ $restaurant->description }}</div>
                    </div>

                    <div class="card-body">
                        <div class="card-subtitle">Address :</div>
                        <div class="card-title">{{ $restaurant->address }}</div>
                    </div>

                    <div class="card-body">
                        <div class="card-subtitle">Services :</div>
                        @foreach($restaurant->services as $service)
                            <div class="card-title">{{ $service->label }}</div>
                        @endforeach
                    </div>

                    <div class="card-body">
                        <div class="card-subtitle">Kitchens :</div>
                        @foreach($restaurant->kitchens as $kitchen)
                            <div class="card-title">{{ $kitchen->label }}</div>
                        @endforeach
                    </div>

                    <div class="card-body">
                        <a href="{{ route('restaurateur.opening::edit', $restaurant->id) }}">Edit openings</a>
                    </div>

                    <div class="card-body">
                        <div class="card-subtitle">Openings :</div>
                        @foreach($restaurant->openings as $opening)
                            <div class="card-title">{{ $opening->day }}</div>
                            <div class="card-title">{{ $opening->open_morning }}</div>
                            <div class="card-title">{{ $opening->open_lunch }}</div>
                            <div class="card-title">{{ $opening->open_dinner }}</div>
                        @endforeach
                    </div>

                    <div class="card-body">
                        <a href="{{ route('restaurateur.discount::edit', $restaurant->id) }}">Edit discounts</a>
                    </div>

                    <div class="card-body">
                        <div class="card-subtitle">Discounts :</div>
                        @foreach($restaurant->discounts as $discount)

                            <div class="card-title">{{ $discount->discount }}</div>
                            <div class="card-title">{{ $discount->subscribers }}</div>
                            <div class="card-title">{{ $discount->stories }}</div>
                            <div class="card-title">{{ $discount->posts }}</div>
                        @endforeach
                    </div>

                    <div class="card-body">
                        <a href="{{ route('restaurateur.product::edit', $restaurant->id) }}">Edit menu</a>
                    </div>

                    <div class="card-body">
                        <div class="card-subtitle">Menu :</div>
                        @foreach($restaurant->products as $product)
                            <div class="card-title">{{ $product->category->label }}</div>
                            <div class="card-title">{{ $product->label }}</div>
                            <div class="card-title">{{ $product->price }}</div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection