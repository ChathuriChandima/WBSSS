<!doctype html>
<html lang="{{ app()->getLocale() }}">
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
    <body data-spy="scroll" data-target=".navbar" data-offset="50">
        @include('inc.navbar')
        @yield('content')
        <h3>-----{{config('app.name','RAJAAN MOTORS')}}----</h3>
    </body>
</html>