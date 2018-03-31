
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/css/header.css">
</head>
<body>
    <div class="nav">
      <div class="nav__inner">
        <div class="nav__logo">
          <a href="/" class="brand__symbol u__inline-block">
            <img src="/img/becardLogo.png" alt="">
          </a>
        </div>
        <div class="nav__links">


        </div>
        <div class="nav__auth">
            @guest
                <a href="{{ route('login') }}" class="nav__link">Login</a>
                <a href="{{ route('register') }}" class="nav__link">
                <button type="submit" class="btn btn-primary">Register</button></a>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle nav__link" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endguest
        </div>
      </div>
    </div>
    <div id="app">
        <div class="spaceHeader"></div>
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
