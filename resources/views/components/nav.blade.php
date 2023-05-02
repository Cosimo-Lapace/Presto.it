<nav class="navbar bg-light fixed-top mynavcolor navresponsive" id="navscroll" >
  <div class="container-fluid">
      {{-- contenuto nav se utente è loggato --}}
      @auth
      <div class="d-flex">
      <a class="navbar-brand" href="{{route('welcome')}}">
      <img src="{{ asset('images/Soggetto.png') }}" alt="Presto" width="60" class="img-fluid">
    </a>
    <a class="navbar-brand mt-1 pt-2 presto-title" href="{{route ('welcome')}}">Presto.it</a>
</div>
<div class="d-flex justify-content-sm-end" id="username">
  <i class="bi bi-person icona-persona"></i><p class="nav-link name-revisor  mt-1 pt-2 " >{{__('ui.saluta')}}, {{auth()->user()->name}}</p>

      @if (Auth::user()->is_revisor)
      <div class="dropdown">
        <i role="button" data-bs-toggle="dropdown" aria-expanded="false" class=" nav-link bi bi-bell campanellina mt-1 pt-2 ms-5 pe-4" id="mybell">
          <span class="spanbellposition translate-middle badge rounded-pill bg-danger" id="spanbell" >
            {{App\Models\Article::countRevisioned()}}
          </span>
        </i>
        <ul class="dropdown-menu" id="mydropmenu">
          <li class="m-2"> <a class="dropdown-item"  href="{{route('indexRevisor')}}">Revisioni <span class="position_absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"> {{App\Models\Article::countRevisioned()}}</span></a></li>
        </ul>
      </div>
      @endif
      <div class="dropdown mt-1 pt-2 ms-5 pe-5 buttonnavresp">
        <i class="bi bi-globe-americas lenguage" href="#"  data-bs-toggle="dropdown" aria-expanded="false"></i>
        <ul class="dropdown-menu">
          <li class="textcolorhover">
            <x-locale lang="it"/>
          </li>
          <li class="textcolorhover">
            <x-locale lang="en"/>
          </li>
          <li class="textcolorhover">
            <x-locale lang="fr"/>
          </li>
        </ul>
      </div>
        {{-- contenuto dropdown --}}



    {{-- contenuto dropdown --}}

    <button class="navbar-toggler iconmenunavhover2" id="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end cont-offcanvas" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Presto.it</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item mt-2">
            <a class="nav-link textcolorhover" aria-current="page" href="{{route ('welcome')}}"><i class="bi bi-houses icon-nav"> {{__('ui.Home')}}</i></a>
          </li>
          <li class="nav-item mt-4">
            <a class="nav-link textcolorhover" aria-current="page" href="{{route('profilo')}}"><i class="bi bi-person-circle icon-nav"> {{__('ui.Profilo')}}</i></a>
          </li>
          <li class="nav-item mt-4">
            <a class="nav-link textcolorhover" href="{{route('articles.index')}}"><i class="bi bi-plus-circle icon-nav"> {{__('ui.inserisci')}}</i></a>
          </li>
          <li class="nav-item mt-4">
            <a class="nav-link textcolorhover" href="{{route ('annunci')}}"><i class="bi bi-card-checklist icon-nav"> {{__('ui.annunci')}}</i></a>
          </li>
          <li class="nav-item mt-4">
            <a class="nav-link textcolorhover" href="{{route ('imieiannunci')}}"><i class="bi bi-clipboard-check icon-nav"> {{__('ui.miei-annunci')}}</i></a>
          </li>
          <li class="nav-item mt-4">
            <a class="nav-link textcolorhover" href="{{route ('favorites.index')}}"><i class="bi bi-heart icon-nav"> {{__('ui.Preferiti')}}</i></a>
          </li>
            <li class="nav-item mt-4">
                <form action="{{route('descrizione')}}" method="POST" >
                    @csrf
                    @method('PUT')
              <button class="nav-link btn btn-white textcolorhover fixborder mt-0" type="submit"><i class="bi bi-briefcase icon-nav"> {{__('ui.lavora')}}</i></button>
            </form>
            </li>
            <li class="nav-item mt-4">
                <form class="d-flex" action="/logout" method="POST">
                    @csrf
              <button class="dropdown-item textcolorhover mt-0" type="submit"><i class="bi bi-arrow-left-circle icon-nav"> Logout </i></button>
            </form>
            </li>



            @else
             {{-- fine contenuto utente loggato --}}

            <div class="d-flex">
            <a class="navbar-brand" href="{{route('welcome')}}">
                <img src="{{ asset('images/Soggetto.png') }}" alt="Presto" width="50" class="img-fluid">
            </a>
            <a class="navbar-brand mt-1 pt-2 presto-title" href="{{route ('welcome')}}">Presto.it</a>
        </div>
        <ul class="navbar profilo-dropdown">
            <a class="nav-link dropdown-toggle pt-1 dropcolor anavresponsive presto-title" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Profilo
            </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item textcolorhover" href="{{route('login')}}">Login</a></li>
                <li><a class="dropdown-item textcolorhover" href="{{route('register')}}">Register</a></li>
            </ul>
        </ul>
     {{-- fine contenuto dropdown --}}
            @endauth
    </div>
      </div>
    </div>
  </div>
</nav>

