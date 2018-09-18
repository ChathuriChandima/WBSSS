@extends('layouts.log')
<link rel="stylesheet" href="{{asset('my/s.css')}}">
@section('content')
<div class="container">

  <div class=”panel panel-default”>

<div class=”panel-heading”>Dashboard</div>

<div class=”panel-body”>
    <p>You are logged in! as {{ strtoupper(Auth::user()->role) }} usertype

    <br>Admin Page: <a href=/adminOnlyPage> adminOnlyPage </a>

    <br>Customer Page: <a href=/customerOnlyPage>/customerOnlyPage</a>

    <br>Accountant Page: <a href=/accountantOnlyPage>/accountantOnlyPage</a>

    <br>Mechanic Page: <a href=/mechanicOnlyPage>/mechanicOnlyPage</a>

    <br>User Page: <a href=/userOnlyPage>/userOnlyPage</a>

    <br>Staff Page: <a href=/staffOnlyPage>/staffOnlyPage</a></p>
</div>
</div>
</div>
</div>
@endsection
