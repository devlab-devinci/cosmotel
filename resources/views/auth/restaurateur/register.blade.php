@extends('layouts.app')

@section('super_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Restaurateur register</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register.register') }}">
                        @csrf
                        
                        <input type="hidden" name="type" value="0">
                        
                        @include('forms.register_form')

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
