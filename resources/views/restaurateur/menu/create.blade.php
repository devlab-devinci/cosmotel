@extends('layouts.app')

@section('css')

@endsection

@section('super_content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Menu register</div>

                    <div class="card-body">
                        <!-- <form class="form-inline" method="POST" action="{{ route('restaurant::create::productStore', ['restaurant_id' => $restaurant_id]) }}">
                            @csrf

                            <input type="hidden" value="{{ $restaurant_id }}">
                            <div class="form-group row">
                                <label for="label" class="col-md-4 col-form-label text-md-right">Nom du produit</label>

                                <div class="col-md-6">
                                    <input id="label" type="text" class="form-control{{ $errors->has('label') ? ' is-invalid' : '' }}" name="label" value="{{ old('label') }}" required>

                                    @if ($errors->has('label'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('label') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="price" class="col-md-4 col-form-label text-md-right">Prix du produit</label>

                                <div class="col-md-6">
                                    <input id="price" type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ old('price') }}" required>

                                    @if ($errors->has('price'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="category">Example select</label>
                                <select class="form-control" id="category" name="category">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->label }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form> -->

                        <form class="form-inline" method="POST" action="{{ route('restaurant::create::productStore', ['restaurant_id' => $restaurant_id]) }}">
                            @csrf
                            
                          <label class="sr-only" for="productName">Nom du produit</label>
                          <input id="productName" type="text" class="mb-2 mr-sm-2 form-control{{ $errors->has('label') ? ' is-invalid' : '' }}" name="label" value="{{ old('label') }}" placeholder="Tarte au citron" required>
                          @if ($errors->has('label'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('label') }}</strong>
                            </span>
                          @endif

                          <label class="sr-only" for="productPrice">Prix du produit</label>
                          <input id="productPrice" type="text" class="mb-2 mr-sm-2 form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ old('price') }}" placeholder="12.50€" required>
                          @if ($errors->has('price'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('price') }}</strong>
                            </span>
                          @endif

                          <label class="sr-only" for="productCategory">Categorie du produit</label>
                            <select class="form-control mb-2 mr-sm-2" id="category" name="category">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->label }}</option>
                                @endforeach
                            </select>

                          <button type="submit" class="btn btn-primary mb-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
