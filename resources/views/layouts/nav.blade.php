<ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->

  @guest
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Restaurateur
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('register.show', ['type' => 'restaurateur']) }}">Register</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('login.show', ['type' => 'restaurateur']) }}">Login</a>
          </div>
      </li>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Influencer
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('register.show', ['type' => 'influencer']) }}">Register</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('login.show', ['type' => 'influencer']) }}">Login</a>
          </div>
      </li>
      
  @else
      <li class="nav-item"><a class="nav-link" href="{{ route('reservations') }}">Mes réservations</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('messages') }}">Messages</a></li>
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
      <li class="nav-item"><a class="nav-link" href="{{ route('helps') }}">Helps</a></li>
</ul>