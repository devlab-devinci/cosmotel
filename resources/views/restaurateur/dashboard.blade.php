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
            <h2>Reservations</h2>
        </div>
        <div class="row">
            @foreach($reservations as $reservation)
                @if( $reservation)
                    <div class="col-12 col-sm-6 col-md-4 mb-3">
                        @if ($reservation->status === "pending")
                        <h5>Action required</h5>
                        @endif
                        <a href="{{ route('restaurateur::reservation.show', $reservation->id) }}">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">{{ $reservation->status }}</div>
                                    <div class="card-title">For {{ $reservation->influencer->username}}</div>
                                    <div class="card-subtitle mb-2 text-muted">For {{ $reservation->client_count }} client</div>
                                    <div class="card-subtitle mb-2 text-muted">With a {{ $reservation->discount }}% discount</div>

                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <div class="container">
        <div class="row">
            <h2>My restaurants</h2>
        </div>
        <div class="row">
            @foreach($restaurants as $restaurant)
                <div class="col-12 col-sm-6 col-md-4 mb-3">
                    <div class="card">
                        <a href="{{ route('restaurateur::restaurant.show', $restaurant->id) }}">
                            <div class="card-body">
                                <div class="card-title">{{ $restaurant->name }}</div>
                                <div class="card-subtitle mb-2 text-muted">{{ $restaurant->address }}</div>
                                {{ $restaurant->description }}
                                <footer class="blockquote-footer">
                                    @foreach($restaurant->services as $service)
                                        {{ $service->label }}
                                    @endforeach
                                    @foreach($restaurant->kitchens as $kitchen)
                                        {{ $kitchen->label }}
                                    @endforeach
                                </footer>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
            <div class="col-12 col-sm-6 col-md-4 mb-3">
                <a class="dropdown-item" href="{{ route('restaurateur::restaurant.create') }}">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">Register a new restaurant</div>
                            <div class="card-subtitle mb-2 text-muted">Want to promote another restaurant ?</div>
                            <footer class="blockquote-footer"></footer>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
@endsection

