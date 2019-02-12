@extends('guest.layouts.home')

@section('content')
    <div class="card" style="width: 25rem;">
        <div class="card-body">
            <h5 class="card-title">{{ $reservation->status }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">You booked
                <a href="{{ route('influencer::restaurant.show', $reservation->restaurant->id) }}">
                    {{ $reservation->restaurant->name }}
                </a>
            </h6>
            <p class="card-text">
                Booked for {{ $reservation->client_count }} clients.
            </p>
            <p class="card-text">
                At {{ $reservation->dateTime }}
            </p>
            <p class="card-text">
                You will have a {{ $reservation->discount }}% discount
            </p>
            <p class="card-text">
                You will have to do {{ $reservation->posts }} posts and {{ $reservation->stories }} stories about the restaurant.
            </p>
            <form method="POST" action="{{ route('influencer::reservation.update', $reservation->id) }}">
                @csrf
                @if ($reservation->status === 'pending' || $reservation->status === 'approved')
                    <button type="submit" value="canceled" name="status" class="btn btn-primary">
                        Cancel my reservation
                    </button>
                @endif
            </form>
        </div>
    </div>
@endsection