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
                    <!-- Authentication Links -->
                    <li class="nav-item"><a class="nav-link" href="{{ route('guest::service') }}">Service</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('guest::blog') }}">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('guest::contact') }}">Contact</a></li>
                    @guest
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Restaurateur
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('register::show', ['type' => 'restaurateur']) }}">Inscription</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('login::show', ['type' => 'restaurateur']) }}">Connexion</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Influencer
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('register::show', ['type' => 'influencer']) }}">Inscription</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('login::show', ['type' => 'influencer']) }}">Connexion</a>
                            </div>
                        </li>
                    @else
                        @if (Auth::user()->influencer)
                            <li class="nav-item"><a class="nav-link" href="{{ route('influencer::search') }}">Search</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('influencer::reservation.list') }}">My reservations</a></li>
                        @elseif (Auth::user()->restaurateur)
                            <li class="nav-item"><a class="nav-link" href="{{ route('restaurateur::dashboard') }}">Dashboard</a></li>
                        @endif
                        <li class="nav-item dropdown">
                          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                              {{ Auth::user()->firstname }} <span class="caret"></span>
                          </a>

                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                  {{ __('Logout') }}
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form>
                          </div>
                      </li>
                    @endguest
                </div>
            </ul>
        </div>
    </nav>
    <main class="py-4">
        @yield('content')
    </main>
</div>
@endsection

@section('js')

@endsection