@extends('guest.layouts.home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header mb-3">Update you restaurant discount</div>
                    <form method="POST" action="{{ route('restaurateur::discount.update') }}">
                        @csrf

                        <input type="hidden" name="restaurant_id" value="{{ $restaurant_id }}">

                        @foreach($current_discounts as $discount)

                            <input type="hidden" name="discounts[{{ $loop->index }}][id]" value="{{ $discount->id }}">

                            <div class="form-group row">
                                <label for="discount" class="col-md-4 col-form-label text-md-right">Discount</label>

                                <div class="col-md-6">
                                    <input id="discount" type="number" min="1" max="100" class="form-control{{ $errors->has('discount') ? ' is-invalid' : '' }}" name="discounts[{{ $loop->index }}][discount]" value="{{ $discount->discount }}" required autofocus>

                                    @if ($errors->has('discount'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('discount') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="discount" class="col-md-4 col-form-label text-md-right">Minimum subscribers</label>

                                <div class="col-md-6">
                                    <input id="subscribers" type="number" step="500" class="form-control{{ $errors->has('subscribers') ? ' is-invalid' : '' }}" name="discounts[{{ $loop->index }}][subscribers]" value="{{ $discount->subscribers }}" required autofocus>

                                    @if ($errors->has('subscribers'))
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('subscribers') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="discount" class="col-md-4 col-form-label text-md-right">Minimum stories</label>

                                <div class="col-md-6">
                                    <input id="stories" type="number" step="1" class="form-control{{ $errors->has('stories') ? ' is-invalid' : '' }}" name="discounts[{{ $loop->index }}][stories]" value="{{ $discount->stories }}" required autofocus>

                                    @if ($errors->has('stories'))
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('stories') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="discount" class="col-md-4 col-form-label text-md-right">Minimum posts</label>

                                <div class="col-md-6">
                                    <input id="posts" type="number" step="1" class="form-control{{ $errors->has('posts') ? ' is-invalid' : '' }}" name="discounts[{{ $loop->index }}][posts]" value="{{ $discount->posts }}" required autofocus>

                                    @if ($errors->has('posts'))
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('posts') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>

                        @endforeach

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update discounts
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection