<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<title>{{config('app.name','RAJAAN MOTORS')}}</title>
<style>
    body{
        padding-top: 75px;
        background-color: black;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        color: white;
        text-align: center;
    }
    body h3{
        font-size: small;
        color: darkgrey;
    }

</style>
</head>
<body>
    <div id="app">
      <nav class="navbar navbar-expand-sm bg-transparent navbar-dark fixed-top" >
          <div class="container">
            <!-- Brand/logo -->
            <a class="navbar-brand" href="/">
              <img src="img/ic.png" alt="logo" style="width:70px;">
            </a>

              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                  <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <!-- Left Side Of Navbar -->
                  <ul class="navbar-nav" style="font-size:larger">
                    <li class="nav-item">
                      <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/service">Services</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/contact">Contact Us</a>
                    </li>
                  </ul>

                  <!-- Right Side Of Navbar -->
                  <ul class="navbar-nav ml-auto">
                      <!-- Authentication Links -->
                      @guest
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('login') }}"><img src="img\icons8_Login_35px.png" >{{ __(' Login') }}</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('register') }}"><img src="img\icons8_Add_User_Male_35px.png" >{{ __(' Register') }}</a>
                          </li>
                      @else
                          <li class="nav-item dropdown">
                              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  {{ Auth::user()->name }} <span class="caret"></span>
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
                  </ul>
              </div>
          </div>
      </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
