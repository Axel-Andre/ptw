<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pave The Way</title>
      <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <!--<script src="{{secure_asset('js/jquery.pjax.js')}}"></script>-->
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ secure_asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/profile.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/mytrajects.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/contact.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/header.css') }}" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <!--<a id="logo-container" href="{{ url('/') }}"><img id="logo-img" src="{{secure_asset('css/logo.png')}}" /></a>-->
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container" id="header-container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li id="logo-container"><a href="{{ url('/') }}"><img id="logo-img" src="{{secure_asset('css/logo.png')}}" /></a></li>
                     <li class="header_my_trajects"><a href="{{ url('/traject') }}"><i class="fa fa-btn fa-car"></i>Mes Trajets</a></li>
                      <li class="header_add_traject"><a href="{{ url('/result') }}"><i class="fa fa-btn fa-search"></i>Rechercher des Trajets</a></li>
               
                    <!--<li id="logo-container"><a href="{{ url('/') }}"><img id="logo-img" src="{{secure_asset('css/logo.png')}}" /></a></li>-->
                </ul>
                
                
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li ><a  id="connexion" href="{{ url('/login') }}">CONNEXION</a></li>
                        <li ><a id="inscription" href="{{ url('/register') }}">INSCRIPTION</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }}  {{ Auth::user()->surname }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/profile/general') }}"><i class="fa fa-btn fa-user"></i>Mon profil</a></li>
                                <li><a href="{{ url('/messages') }}"><i class="fa fa-btn fa-envelope"></i>Mes Messages</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Deconnexion</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    
    <main id="pjax-container">
        @yield('content')
    </main>
    
    <footer>
        <p>PAVE THE WAY &copy</p>
    </footer>

  
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script src="{{ secure_asset('js/script.js') }}"></script>
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCuzGCTEjbtUKr6Hbg2XO8qOMkYTzB-qug&libraries=places&callback=initMap"
        async defer></script>
</body>
</html>
