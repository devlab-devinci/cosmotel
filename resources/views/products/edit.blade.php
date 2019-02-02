@extends('guest.layouts.home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header mb-3">Register a part of your menu</div>
                    <form method="POST" action="{{ route('restaurateur.product::update') }}">
                        @csrf

                        <input type="hidden" name="restaurant_id" value="{{ $restaurant_id }}">

                        <div class="form-group row">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="col-md-12 col-form-label text-md-right">Products</label>
                                </div>
                            </div>

                            @foreach($current_products as $product)

                                <div class="row">

                                    <input type="hidden" name="products[{{ $loop->index }}][id]" value="{{ $product->id }}">

                                    <div class="col-md-6">
                                        <div class="row">
                                            <label for="label_{{ $loop->index }}" class="col-md-12 col-form-label text-md-right">Name</label>
                                        </div>
                                        <input id="label_{{ $loop->index }}" type="text" class="form-control{{ $errors->has('label_' . $loop->index) ? ' is-invalid' : '' }}" name="products[{{ $loop->index }}][label]" value="{{ $product->label }}" required autofocus>

                                        @if ($errors->has('label_' . $loop->index))
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('label_' . $loop->index) }}</strong>
                                                </span>
                                        @endif
                                    </div>

                                    <div class="col-md-2">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="price_{{ $loop->index }}" class="col-md-12 col-form-label text-md-right">Price</label>
                                            </div>
                                        </div>
                                        <input id="price_{{ $loop->index }}" type="text" class="form-control{{ $errors->has('price_' . $loop->index) ? ' is-invalid' : '' }}" name="products[{{ $loop->index }}][price]" value="{{ $product->price }}" required autofocus>

                                        @if ($errors->has('price_' . $loop->index))
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('price_' . $loop->index) }}</strong>
                                                </span>
                                        @endif
                                    </div>

                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="category_{{ $loop->index }}" class="col-md-12 col-form-label text-md-right">Type of product</label>
                                            </div>
                                        </div>
                                        <select id="category_{{ $loop->index }}" type="text" class="form-control{{ $errors->has('category_' . $loop->index) ? ' is-invalid' : '' }}" name="products[{{ $loop->index }}][category_id]" required autofocus>
                                            @foreach($product_categories as $category)
                                                <option @if ($category->id == $product->category->id) selected @endif value="{{ $category->id }}">{{ $category->label }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('category_' . $loop->index))
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('category_' . $loop->index) }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update products
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection