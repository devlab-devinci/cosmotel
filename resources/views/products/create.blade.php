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

                        @foreach($product_categories as $category)

                            <div class="form-group row">
                                <label for="{{ $category->slug }}" class="col-md-2 col-form-label text-md-right">{{ $category->label }}</label>

                                <div class="col-md-5">
                                    <input id="{{ $category->slug }}" type="text" class="form-control{{ $errors->has($category->slug) ? ' is-invalid' : '' }}" name="products[]" required autofocus>

                                    @if ($errors->has($category->slug))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first($category->slug) }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <input type="hidden" name="product_category[]" value="{{ $category->id }}">

                                <label for="{{ $category->slug }}-price" class="col-md-2 col-form-label text-md-right">Price</label>

                                <div class="col-md-2">
                                    <input id="{{ $category->slug }}-price" type="number" class="form-control{{ $errors->has($category->slug . '-price') ? ' is-invalid' : '' }}" name="prices[]" required autofocus>

                                    @if ($errors->has($category->slug . '-price'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first($category->slug . '-price') }}</strong>
                                        </span>
                                    @endif
                                </div>

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