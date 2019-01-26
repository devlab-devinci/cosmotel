@extends('layouts.common')

@section('css')

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">

		@foreach($restaurants as $restaurant)
			<div class="col-md-8">
	            <div class="card">
	                <div class="card-header">{{ $restaurant->name }}</div>

	                <div class="card-body">
						<h6 class="card-subtitle mb-2 text-muted">{{ $restaurant->address }}</h6>
						<p class="card-text">{{ $restaurant->description }}</p>
	                </div>
	            </div>
	        </div>
		@endforeach
	</div>
</div>
@endsection

@section('js')

@endsection