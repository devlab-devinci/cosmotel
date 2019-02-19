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
            @foreach($reservations as $reservation)
                @if( $reservation)
                    <div class="col-12 col-sm-6 col-md-4 mb-3">
                        <a href="{{ route('influencer::reservation.show', $reservation->id) }}">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">{{ $reservation->status }}</div>
                                    <div class="card-subtitle mb-2 text-muted">{{ $reservation->restaurant->name}}</div>
                                    <div class="card-subtitle mb-2 text-muted">For {{ $reservation->client_count }} persons</div>
                                    <div class="card-subtitle mb-2 text-muted">{{ $reservation->discount }}% discount</div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection

