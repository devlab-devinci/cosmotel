@extends('guest.layouts.home')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>My reservations</h2>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <h2>Booking</h2>
        </div>
        <div class="row">
            @foreach($reservations as $reservation)
                @if( $reservation)
                    <div class="col-12 col-sm-6 col-md-4 mb-3">
                        <a href="{{ route('influencer::reservation.show', $reservation->id) }}">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">{{ $reservation->influencer_id }}</div>
                                    <div class="card-subtitle mb-2 text-muted">{{ $reservation->restaurant_id }}</div>
                                    {{ $reservation->client_count }}
                                    <footer class="blockquote-footer">{{ $reservation->discount }}</footer>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection

