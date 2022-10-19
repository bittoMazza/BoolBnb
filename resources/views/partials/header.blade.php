<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="p-0 me-4" href="{{ url('/') }}">
            <img class="header_img" src="https://tinypic.host/images/2022/10/14/Logo_sm.png" alt="BoolBnB">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav d-flex align-items-center align-items-middle">
                @guest
                @else
                    <li>
                        <a class="pe-3 nav-link {{ request()->routeIs('host.apartments.index') ? 'text-primary fw-bold' : '' }}"
                            href="{{ route('host.apartments.index') }}">I Miei Appartamenti</a>
                    </li>
                    <li>
                        <a class="pe-4 nav-link {{ request()->routeIs('host.apartments.deletedApartments') ? 'text-primary fw-bold' : '' }}"
                            href="{{ route('host.apartments.deletedApartments') }}">Cestino</a>
                    </li>
                    <li>
                        <a class="btn btn-sm btn-outline-success px-3 {{ request()->routeIs('host.apartments.create') ? 'active' : '' }}"
                            href="{{ route('host.apartments.create') }}">Aggiungi Appartamento</a>
                    </li>
                @endguest
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Registrati') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <span><i class="bi bi-person-circle align-middle me-1"></i> {{ Auth::user()->name }}</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
