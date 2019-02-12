@extends('guest.layouts.home')

@section('content')
    <div class="card" style="width: 25rem;">
        <div class="card-body">
            <h5 class="card-title">Reservation by {{ $reservation->influencer->username }}</h5>
            <h5 class="card-title">{{ $reservation->status }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">For {{ $reservation->restaurant->name }}</h6>
            <p class="card-text">
                Booked for {{ $reservation->client_count }} clients.
            </p>
            <p class="card-text">
                For {{ $reservation->dateTime }}
            </p>
            <p class="card-text">
                Influencer will have a {{ $reservation->discount }}% discount
            </p>
            <p class="card-text">
                Have to do {{ $reservation->posts }} posts and {{ $reservation->stories }} stories.
            </p>

            <form method="POST" action="{{ route('restaurateur::reservation.update', $reservation->id) }}">
                @csrf

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        @if ($reservation->status === "rejected")
                            <button type="submit" value="approved" name="status" class="btn btn-primary">
                                Validate
                            </button>
                        @elseif ($reservation->status === "pending")
                            <button type="submit" value="approved" name="status" class="btn btn-primary">
                                Validate
                            </button>
                            <button type="submit" value="rejected" name="status" class="btn btn-secondary">
                                Reject
                            </button>
                        @else
                            <button type="submit" value="rejected" name="status" class="btn btn-secondary">
                                Reject
                            </button>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection