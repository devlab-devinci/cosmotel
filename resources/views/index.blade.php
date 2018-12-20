@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row">
        @foreach($restaurants as $restaurant)
        <?php 
            $restaurateur = $restaurant->restaurateur;
        ?>
            <div class="col-12 col-sm-6 col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">{{ $restaurant->label }}</div>
                        <div class="card-subtitle mb-2 text-muted">{{ $restaurant->address }}</div>
                        {{ $restaurant->description }}
                        <footer class="blockquote-footer">{{ $restaurateur->fullname }}</footer>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

