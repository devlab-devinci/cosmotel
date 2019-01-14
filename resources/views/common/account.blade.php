@extends('layouts.common')

@section('css')

@endsection

@section('content')
<div class="container">
	<form method="POST" action="{{ route('myAccount::update') }}">
    	@csrf
    	@method('PUT')

		<div class="form-group row">
		    <label for="firstname" class="col-md-4 col-form-label text-md-right">Firstname</label>

		    <div class="col-md-6">
		        <input id="firstname" type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" value="{{ $user->firstname }}" required autofocus>

		        @if ($errors->has('firstname'))
		            <span class="invalid-feedback" role="alert">
		                <strong>{{ $errors->first('firstname') }}</strong>
		            </span>
		        @endif
		    </div>
		</div>

		<div class="form-group row">
		    <label for="lastname" class="col-md-4 col-form-label text-md-right">Lastname</label>

		    <div class="col-md-6">
		        <input id="lastname" type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ $user->lastname }}" required autofocus>

		        @if ($errors->has('lastname'))
		            <span class="invalid-feedback" role="alert">
		                <strong>{{ $errors->first('lastname') }}</strong>
		            </span>
		        @endif
		    </div>
		</div>

		<div class="form-group row">
		    <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>

		    <div class="col-md-6">
		        <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $user->phone }}" required autofocus>

		        @if ($errors->has('phone'))
		            <span class="invalid-feedback" role="alert">
		                <strong>{{ $errors->first('phone') }}</strong>
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
@endsection

@section('js')

@endsection