@extends('guest.layouts.home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header mb-3">Register a new restaurant</div>

                    <form method="POST">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $current_restaurant->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" required autofocus>{{ $current_restaurant->description }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ $current_restaurant->address }}" required autofocus>

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="latitude" class="col-md-4 col-form-label text-md-right">latitude</label>

                            <div class="col-md-6">
                                <input id="latitude" type="text" class="form-control{{ $errors->has('latitude') ? ' is-invalid' : '' }}" name="latitude" value="{{ $current_restaurant->latitude }}" required autofocus>

                                @if ($errors->has('latitude'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('latitude') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="longitude" class="col-md-4 col-form-label text-md-right">longitude</label>

                            <div class="col-md-6">
                                <input id="longitude" type="text" class="form-control{{ $errors->has('longitude') ? ' is-invalid' : '' }}" name="longitude" value="{{ $current_restaurant->longitude }}" required autofocus>

                                @if ($errors->has('longitude'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('longitude') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="services" class="col-md-4 col-form-label text-md-right">services</label>

                            <div class="col-md-6">

                                <?php $current_restaurant_services_ids = []; ?>

                                @foreach ($current_restaurant->services as $service)
                                        <?php $current_restaurant_services_ids[$service->id] = 1; ?>
                                    <input type="checkbox" checked name="services[]" value="{{ $service->id }}" class="{{ $errors->has('service') ? ' is-invalid' : '' }}">
                                    {{ $service->label }}
                                @endforeach

                                @foreach ($services as $service)
                                    @if (!isset($current_restaurant_services_ids[$service->id]))
                                        <input type="checkbox"  name="services[]" value="{{ $service->id }}" class="{{ $errors->has('service') ? ' is-invalid' : '' }}">
                                        {{ $service->label }}
                                    @endif
                                @endforeach

                                @if ($errors->has('services'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('services') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kitchens" class="col-md-4 col-form-label text-md-right">kitchen</label>

                            <div class="col-md-6">
                                <?php $current_restaurant_kitchens_ids = []; ?>

                                    @foreach ($current_restaurant->kitchens as $kitchen)
                                        <?php $current_restaurant_kitchens_ids[$kitchen->id] = 1; ?>
                                        <input type="checkbox" checked name="kitchens[]" value="{{ $kitchen->id }}" class="{{ $errors->has('kitchen') ? ' is-invalid' : '' }}">
                                        {{ $kitchen->label }}
                                    @endforeach

                                @foreach ($kitchens as $kitchen)
                                        @if (!isset($current_restaurant_kitchens_ids[$kitchen->id]))
                                            <input type="checkbox" name="kitchens[]" value="{{ $kitchen->id }}" class="{{ $errors->has('kitchen') ? ' is-invalid' : '' }}">
                                            {{ $kitchen->label }}
                                        @endif
                                @endforeach

                                @if ($errors->has('kitchen'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('kitchen') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection