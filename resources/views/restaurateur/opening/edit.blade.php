@extends('guest.layouts.home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header mb-3">Register a part of your menu</div>
                    <form method="POST" action="{{ route('restaurateur::opening.update') }}">
                        @csrf

                        <input type="hidden" name="restaurant_id" value="{{ $restaurant_id }}">

                        @foreach($current_openings as $opening)

                            <div class="form-group row">
                                <div class="col-12">
                                    <h2>{{ jddayofweek($opening->day, 1) }}</h2>
                                </div>

                                <input type="hidden" name="days[{{ $opening->day }}][id]" value="{{ $opening->id }}">

                                @foreach($times as $time)

                                    <label for="{{ $opening->day }}_{{ $time }}" class="col-md-3 col-form-label text-md-right">Open on {{ jddayofweek($opening->day, 1) }} - {{ $time }}</label>

                                    <div class="col-md-1">
                                        <input id="{{ $opening->day }}_{{ $time }}"  @if($opening->{'open_' . $time}) checked @endif type="checkbox" class="form-control{{ $errors->has($opening->day . '_' . $time) ? ' is-invalid' : '' }}" name="days[{{ $opening->day }}][open_{{ $time }}]" autofocus>

                                        @if ($errors->has($opening->day . '_' . $time))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first($opening->day . '_' . $time) }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <label for="{{ $opening->day }}_{{ $time }}-open" class="col-md-1 col-form-label text-md-right">Open time</label>

                                    <div class="col-md-3">
                                        <input id="{{ $opening->day }}_{{ $time }}-open" type="time" class="form-control{{ $errors->has($opening->day . '_' . $time . '-open') ? ' is-invalid' : '' }}" name="days[{{ $opening->day }}][open_time_{{ $time }}]" value="{{ $opening->{'open_time_' . $time} }}" autofocus>

                                        @if ($errors->has($opening->day . '_' . $time . '-open'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first($opening->day . '_' . $time . '-open') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <label for="{{ $opening->day }}_{{ $time }}-close" class="col-md-1 col-form-label text-md-right">Close time</label>

                                    <div class="col-md-3">
                                        <input id="{{ $opening->day }}_{{ $time }}-close" type="time" class="form-control{{ $errors->has($opening->day . '_' . $time . '-close') ? ' is-invalid' : '' }}" name="days[{{ $opening->day }}][close_time_{{ $time }}]" value="{{ $opening->{'close_time_' . $time} }}" autofocus>

                                        @if ($errors->has($opening->day . '_' . $time . '-close'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first($opening->day . '_' . $time . '-close') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endforeach

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection