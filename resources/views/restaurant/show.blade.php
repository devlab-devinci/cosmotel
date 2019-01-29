@extends('restaurateur.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ $restaurant->title }}
                    </div>

                    <div class="card-body">
                        <div class="card-subtitle">Description :</div>
                        <div class="card-title">{{ $restaurant->description }}</div>
                    </div>

                    <div class="card-body">
                        <div class="card-subtitle">Address :</div>
                        <div class="card-title">{{ $restaurant->address }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection