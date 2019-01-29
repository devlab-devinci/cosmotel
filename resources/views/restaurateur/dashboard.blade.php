@extends('guest.layouts.home')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Dashboard restaurateur</h2>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <h2>Reservations list</h2>
        </div>
        <div class="row">
            @foreach($reservations as $reservation)
                @if( $reservation)
                    <div class="col-12 col-sm-6 col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">{{ $reservation->influencer_id }}</div>
                                <div class="card-subtitle mb-2 text-muted">{{ $reservation->restaurant_id }}</div>
                                {{ $reservation->client_count }}
                                <footer class="blockquote-footer">{{ $reservation->discount }}</footer>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <div class="container">
        <div class="row">
            <h2>Restaurants list</h2>
        </div>
        <div class="row">
            @foreach($restaurants as $restaurant)
                <div class="col-12 col-sm-6 col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">{{ $restaurant->name }}</div>
                            <div class="card-subtitle mb-2 text-muted">{{ $restaurant->address }}</div>
                            {{ $restaurant->description }}
                            <footer class="blockquote-footer"></footer>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-12 col-sm-6 col-md-4 mb-3">
                <a class="dropdown-item" href="{{ route('restaurateur.restaurant::create') }}">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">Register a new restaurant</div>
                            <div class="card-subtitle mb-2 text-muted">Want to promote another restaurant ?</div>
                                IMG
                            <footer class="blockquote-footer"></footer>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
@endsection

