
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
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">

    @yield('css')
</head>
<body>

    <div class="nav">
      <div class="nav__inner">
        <div class="nav__logo">
          <a href="/home" class="brand__symbol u__inline-block">
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
                    <a href="#" class="dropdown-toggle nav__link" style="font-size: 15px;" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                        {{ Auth::user()->username }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">
                        <li class="subMenuProfile">
                           <center>
                            <img src="{{ asset('img/users').'/'.Auth::user()->image }}" class="img-responsive img-circle"><br>
                            <b>{{ Auth::user()->name }}</b>
                            <a href="{{ route('reward' )}}"><p style="color:#5395CC;">
                            <span class="fab fa-gg-circle"></span> BePoint : <b >{{ Auth::user()->bePoint }}</b></p></a>
                        </center>
                        </li>

                        @if (Auth::user()->role == "Admin")
                        <hr>
                        <li><a href="/admin/dashboard">Admin Dashboard</a></li>
                        <li><a href="{{ route('shop.index') }}">Shop</a></li>
                        @elseif (Auth::user()->role == "Entrepreneur" )
                        <hr>
                        <li><a href="{{ route('shop.index') }}">Shop</a></li>
                        @elseif (Auth::user()->role == "User")
                        <hr>
                        <li><a href="{{ route('shop.register') }}">Create Enterpreneur</a></li>
                        @endif

                        <hr>
                        <li><a href="/home">Dashboard</a></li>
                        <li><a href="{{ route('reward' )}}">Reward</a></li>
                        <li><a href="{{ route('voucher') }}">Voucher</a></li>
                        <hr>
                        <li><a href="{{ route('affiliate') }}">Affiliate</a></li>
                        <li><a href="/setting">Profile Setting</a></li>
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
    @yield('jsBefore')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbR2fPnPAqOeegpN6ml_SNSMSc7wN613k"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
    @yield('js')


</body>
</html>
