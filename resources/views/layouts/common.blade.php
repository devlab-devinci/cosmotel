@extends('layouts.app')

@section('css')

@endsection

@section('super_content')
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                Cosmotel
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
				  	@if (Auth::user()->influencer)
				    	<li class="nav-item"><a class="nav-link" href="{{ route('influencer::search') }}">Recherche</a></li>
				  	@elseif (Auth::user()->restaurateur)
				    	<li class="nav-item"><a class="nav-link" href="{#">Annonce</a></li>
				  	@endif
				  	<li class="nav-item"><a class="nav-link" href="#">Mes réservations</a></li>
				  	<li class="nav-item"><a class="nav-link" href="#">Messages</a></li>
				  	<li class="nav-item dropdown">
				      	<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
				          	{{ Auth::user()->firstname }} <span class="caret"></span>
				      	</a>

				      	<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
			      			<a class="dropdown-item" href="{{ route('myAccount::show') }}">
			      				Mon compte
			      			</a>
				          	<a class="dropdown-item" href="{{ route('logout') }}"
				             onclick="event.preventDefault();
				                           document.getElementById('logout-form').submit();">
				              	Déconnexion
				          	</a>

				          	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				              	@csrf
				          	</form>
				      	</div>
				  	</li>
				  	<li class="nav-item"><a class="nav-link" href="#">Helps</a></li>
				  	<li class="nav-item m-l-20"><a class="nav-link" href="#">Notifs</a></li>
				</ul>
			</div>
        </div>
    </nav>
    <main class="py-4">
        @yield('content')
    </main>
</div>
@endsection

@section('js')

@endsection