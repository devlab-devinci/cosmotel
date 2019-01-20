@extends('layouts.app')

@section('super_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Influencer register</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register.register') }}">
                        @csrf
                        
                        <input type="hidden" name="type" value="1">

                        @include('auth.forms.register_form')

                        <hr>
                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">Nom d'utilisateur instagram</label>

                            <div class="col-md-6">
                                <input id="username" type="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

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
