@extends('influencer.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @if(Auth::check() && Auth::user()->id == $user->id)
                        Your profil
                    @else
                       {{ $user->firstname }}'s profil
                    @endif
                </div>
                
                <div class="card-body">
                    <div class="card-subtitle">Firstname :</div>
                    <div class="card-title">{{ $user->firstname }}</div>
                </div>
                <div class="card-body">
                    <div class="card-subtitle">Lastname :</div>
                    <div class="card-title">{{ $user->lastname }}</div>
                </div>
                <div class="card-body">
                    <div class="card-subtitle">E-mail :</div>
                    <div class="card-title">{{ $user->email }}</div>
                </div>
                <div class="card-body">
                    <div class="card-subtitle">Phone :</div>
                    <div class="card-title">{{ $user->phone }}</div>
                </div>
                <div class="card-body">
                    <div class="card-subtitle">User type :</div>
                    <div class="card-title">Influencer</div>
                </div>
                @if(Auth::check() && Auth::user()->id == $user->id)
                <div class="card-body">
                    <a href="{{ route('influencer.edit', ['id' => $user->id]) }}" class="btn btn-primary">Edit</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection