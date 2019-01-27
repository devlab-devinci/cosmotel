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
                        <form class="productLine form-row">
                        <!-- <form class="form-inline" method="POST" action="{{ route('restaurant::create::productStore', ['restaurant_id' => $restaurant_id]) }}"> -->
                            @csrf 
                            <div class="form-group col-5" data-propriety="label">
                                <label for="productName">Nom du produit</label>
                                <input type="text" class="form-control{{ $errors->has('label') ? ' is-invalid' : '' }}" id="productName" placeholder="Tarte à la fraise" value="{{ old('label') }}" required="">
                                @if ($errors->has('label'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('label') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group col-4" data-propriety="category">
                                <label for="productPrice">Type du produit</label>
                                <select class="form-control" id="productCategory" name="productCategory" required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->label }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-3" data-propriety="price">
                                <label for="productPrice">Prix du produit</label>
                                <input type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" id="productPrice" placeholder="12.5" value="{{ old('price') }}" required="">
                                @if ($errors->has('price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!-- <button type="submit" class="submitProducts btn btn-primary mb-2">Submit</button> -->
                        </form>

                        <div class="addProductLine">
                            +   Ajouté un produit !
                        </div>
                        
                        <button type="submit" class="submitProducts btn btn-primary mb-2">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        // $.ajaxSetup({
        //     headers: {
        //       'X-CSRF-TOKEN': '{{ csrf_token() }}'
        //     }
        // });

        var url = "{{ route('restaurant::create::productStore', ['restaurant_id' => $restaurant_id]) }}";
        var urlToBack = "{{ route('restaurateur::index') }}";
    </script>
@endsection
