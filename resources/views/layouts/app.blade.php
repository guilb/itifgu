<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Effia') }}</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  @yield('css')
</head>
<body>
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <div class="main-brand">
        <a href="{{ route('home') }}" class="navbar-brand" title="Accueil">
          <span class="logo"></span>
        </a>
      </div>

      <div class="main-nav">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            @admin
            <li class="nav-item">
              <a class="nav-link" href="{{ route('order.index') }}"> @lang('Commandes')</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('invoice.index') }}"> @lang('Factures')</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('user.index') }}">@lang('Utilisateurs')</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle{{ currentRoute(
                route('category.create'),
                route('category.index'),
                route('category.edit', request()->category?: 0),
                route('product.create'),
                route('product.index'),
                route('order.create'),
                route('order.index'),
                route('invoice.index'),
                route('product.edit', request()->product?: 0),
                route('user.index')
                )}}" href="#" id="navbarDropdownGestCat" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @lang('Administration')
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownGestCat">
                <a class="dropdown-item" href="{{ route('category.index') }}">
                  <i class="fas fa-wrench fa-lg"></i> @lang('Gérer les catégories')
                </a>
                <a class="dropdown-item" href="{{ route('product.index') }}">
                  <i class="fas fa-wrench fa-lg"></i> @lang('Gérer les produits')
                </a>
              </div>
            </li>
            @else
            @auth
            <li class="nav-item">
              <a class="nav-link" href="{{ route('order.index') }}">@lang('Mes commandes')</a>
              </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('order.create') }}">@lang('Passer une commande')</a>
            </li>
              <!-- <a class="nav-link dropdown-toggle{{ currentRoute(
                route('order.create'),
                route('order.index')
                )}}" href="#" id="navbarDropdownGestCat" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @lang('Menu')
              </a> -->
            @endauth
            @endadmin
          </ul>
          <ul class="navbar-nav ml-5">
            @guest
            <li class="nav-item{{ currentRoute(route('login')) }}"><a class="nav-link" href="{{ route('login') }}">@lang('Connexion')</a></li>
            <li class="nav-item{{ currentRoute(route('register')) }}"><a class="nav-link" href="{{ route('register') }}">@lang('Inscription')</a></li>
            @else
            <li class="nav-item{{ currentRoute(route('profile.edit', auth()->id())) }}"><a class="nav-link" href="{{ route('profile.edit', auth()->id()) }}">@lang('Profil')</a></li>
            <li class="nav-item">
              <a id="logout" class="nav-link" href="{{ route('logout') }}">@lang('Déconnexion')</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hide">
                {{ csrf_field() }}
              </form>
            </li>
            @endguest
          </ul>
        </div>
      </div>
    </div>

  </nav>
  @if (session('ok'))
  <div class="container">
    <div class="alert alert-dismissible alert-success fade show" role="alert">
      {{ session('ok') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
  @endif
  @yield('content')
  <script src="{{ asset('js/app.js') }}"></script>
  @yield('script')
  <script>
  $(function() {
    $('#logout').click(function(e) {
      e.preventDefault();
      $('#logout-form').submit()
    })
  })
</script>
</body>
</html>
