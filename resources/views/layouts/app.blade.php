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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>{{config('app.name','RAJAAN MOTORS')}}</title>
</head>
<style>
    body h3{
    font-size: small;
    color: darkgrey;
}
</style>
<body style="background-color:black; padding-top: 75px; font-family:Georgia, 'Times New Roman', Times, serif; color: white; text-align: center;">
    <div id="app">
        @guest
            @include('elements.guestNavbar')
        @else
            @include('elements.logedNavbar')
        @endguest
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
