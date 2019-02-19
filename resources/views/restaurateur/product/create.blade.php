@extends('guest.layouts.home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header mb-3">Register a part of your menu</div>
                    <form method="POST" action="{{ route('restaurateur::product.store') }}">
                        @csrf

                        <input type="hidden" name="restaurant_id" value="{{ $restaurant_id }}">

                        <div id="product_list">
                            <div id="product_init">

                                <div class="form-group row">
                                    <div class="row">
                                        <label class="col-md-12 col-form-label text-md-right">Products</label>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="row">
                                            <label for="label" class="col-md-12 col-form-label text-md-right">Name</label>
                                        </div>
                                        <input id="label" type="text" class="form-control{{ $errors->has('label') ? ' is-invalid' : '' }}" name="products[1][label]" required autofocus>

                                        @if ($errors->has('label'))
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('label') }}</strong>
                                                </span>
                                        @endif
                                    </div>

                                    <div class="col-md-2">
                                        <div class="row">
                                            <label for="price" class="col-md-12 col-form-label text-md-right">Price</label>
                                        </div>
                                        <input id="price" type="number" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="products[1][price]" required autofocus>

                                        @if ($errors->has('price'))
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('price') }}</strong>
                                                </span>
                                        @endif
                                    </div>

                                    <div class="col-md-4">
                                        <div class="row">
                                            <label for="category" class="col-md-12 col-form-label text-md-right">Type of product</label>
                                        </div>
                                        <select id="category" type="text" class="form-control{{ $errors->has('category') ? ' is-invalid' : '' }}" name="products[1][category_id]" required autofocus>
                                            @foreach($product_categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->label }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('category'))
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('category') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <div id="moreProduct" class="btn btn-secondary">
                                    More product
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Add products
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script type="text/javascript">
        $('#moreProduct').click(function() {
            addProductInput();
        });

        var i = 2;

        function addProductInput() {
            var clone = $('#product_init').clone();

            clone.find('input[name="products[1][label]"]').attr('name', 'products[' + i + '][label]');
            clone.find('input[name="products[1][label]"]').val('');
            clone.find('input[name="products[1][price]"]').attr('name', 'products[' + i + '][price]');
            clone.find('input[name="products[1][price]"]').val('');
            clone.find('select[name="products[1][category_id]"]').attr('name', 'products[' + i + '][category_id]');

            clone.appendTo('#product_list');

            i++;
        }
    </script>
@endsection