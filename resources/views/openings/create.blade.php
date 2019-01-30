@extends('guest.layouts.home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header mb-3">Register a part of your menu</div>
                    <form method="POST" action="{{ route('restaurateur.product::store') }}">
                        @csrf

                        <input type="hidden" name="restaurant_id" value="{{ $restaurant_id }}">

                        @foreach($days as $day)
                            <div class="form-group row">
                                <div class="col-12">
                                    <h2>{{ $day }}</h2>
                                </div>

                                @foreach($times as $time)

                                    <label for="{{ $day }}_{{ $time }}" class="col-md-3 col-form-label text-md-right">Open on {{ $day }} - {{ $time }}</label>

                                    <div class="col-md-1">
                                        <input id="{{ $day }}_{{ $time }}" type="checkbox" class="form-control{{ $errors->has($day . '_' . $time) ? ' is-invalid' : '' }}" name="open_{{ $time }}[]" autofocus>

                                        @if ($errors->has($day . '_' . $time))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first($day . '_' . $time) }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <label for="{{ $day }}_{{ $time }}-open" class="col-md-2 col-form-label text-md-right">Open time</label>

                                    <div class="col-md-2">
                                        <input id="{{ $day }}_{{ $time }}-open" type="number" class="form-control{{ $errors->has($day . '_' . $time . '-open') ? ' is-invalid' : '' }}" name="open_time_{{ $time }}[]" autofocus>

                                        @if ($errors->has($day . '_' . $time . '-open'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first($day . '_' . $time . '-open') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <label for="{{ $day }}_{{ $time }}-close" class="col-md-2 col-form-label text-md-right">Close time</label>

                                    <div class="col-md-2">
                                        <input id="{{ $day }}_{{ $time }}-close" type="number" class="form-control{{ $errors->has($day . '_' . $time . '-close') ? ' is-invalid' : '' }}" name="close_time_{{ $time }}[]" autofocus>

                                        @if ($errors->has($day . '_' . $time . '-close'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first($day . '_' . $time . '-close') }}</strong>
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