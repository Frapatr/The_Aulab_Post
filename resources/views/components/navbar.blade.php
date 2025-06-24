<nav class="navbar navbar-expand-lg bg-dark navbar-dark shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold" href="{{ route('homepage') }}">The Aulab Post</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('homepage') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('article.index') }}">Tutti gli articoli</a>
        </li>
         <li class="nav-item">
            <a class="nav-link" href="{{ route('careers') }}">Lavora con noi</a>
        </li>
      </ul>

      {{-- Form di ricerca aggiunto --}}
      <form class="d-flex" action="{{ route('article.search') }}" method="GET">
        <input class="form-control me-2" type="search" name="query" placeholder="Cerca articoli..." aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Cerca</button>
      </form>

      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Registrati</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Accedi</a>
            </li>
        @endguest
        @auth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Ciao, {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    @if(Auth::user()->is_writer)
                      <li><a class="dropdown-item" href="{{ route('article.create') }}">Inserisci Articolo</a></li>
                    @endif
                    @if(Auth::user()->is_admin)
                      <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard Admin</a></li>
                    @endif
                    @if(Auth::user()->is_revisor)
                      <li><a class="dropdown-item" href="{{ route('revisor.dashboard') }}">Dashboard Revisore</a></li>
                    @endif
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf </form>
                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                    </li>
                </ul>
            </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>