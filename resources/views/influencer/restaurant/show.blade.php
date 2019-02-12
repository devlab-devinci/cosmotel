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
                        </div>
                    </div>


                    <form method="POST" action="{{ route('influencer::reservation::store') }}">
                        @csrf

                        <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">

                        <div class="form-group row">
                            <div class="row">
                                <label class="col-md-12 col-form-label text-md-right">Book</label>
                            </div>

                            <div class="col-md-6">
                                <div class="row">
                                    <label for="date" class="col-md-12 col-form-label text-md-right">Date</label>
                                </div>
                                <input id="date" type="date" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" name="date" required autofocus>

                                @if ($errors->has('date'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <div class="row">
                                    <label for="time" class="col-md-12 col-form-label text-md-right">Time</label>
                                </div>
                                <input id="time" type="time" class="form-control{{ $errors->has('time') ? ' is-invalid' : '' }}" name="time" required autofocus>

                                @if ($errors->has('time'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('time') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <div class="row">
                                    <label for="discount" class="col-md-12 col-form-label text-md-right">Discount</label>
                                </div>
                                <select id="discount" class="form-control{{ $errors->has('discount') ? ' is-invalid' : '' }}" name="discount" required autofocus>
                                    @foreach($restaurant->discounts as $discount)
                                        <option value="{{ $discount->id }}">
                                            {{ $discount->discount }} %, more than {{ $discount->subscribers }}, {{ $discount->stories }} stories, {{ $discount->posts }} posts
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('discount'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('discount') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <div class="row">
                                    <label for="number" class="col-md-12 col-form-label text-md-right">Number</label>
                                </div>
                                <select id="number" class="form-control{{ $errors->has('number') ? ' is-invalid' : '' }}" name="number" required autofocus>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                </select>
                                @if ($errors->has('number'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Book
                                </button>
                            </div>
                        </div>
                    </form>



                    <div class="card-body">
                        @foreach($restaurant->images as $image)
                            <img class="img-thumbnail m-2" src="{{ URL::to('/') }}/{{ $image->src }}">
                        @endforeach
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
                        <div class="card-subtitle">Openings :</div>
                        @foreach($restaurant->openings as $opening)
                            <div class="card-title">{{ $opening->day }}</div>
                            <div class="card-title">{{ $opening->open_morning }}</div>
                            <div class="card-title">{{ $opening->open_lunch }}</div>
                            <div class="card-title">{{ $opening->open_dinner }}</div>
                        @endforeach
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