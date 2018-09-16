@extends('layouts.app')
<link rel="stylesheet" href="{{asset('my/l.css')}}">
@section('content')
<br><br><br><br><br>
    <div class="container" >
    <div class="login-form" >
    <div class="main-div border border-warning rounded" style="background-color:black">
        <div class="panel" >
           <h1 style="color:goldenrod">Login</h1>
           <p>Please enter your username and password</p>
           </div>
            <form id="Login">
                <div class="form-group border border-warning rounded" >
                    <input type="text" class="form-control form-control-lg text-white bg-dark" id="inputUsername" placeholder="Username">
                </div>
                <div class="form-group border border-warning rounded">
                    <input type="password" class="form-control form-control-lg text-light bg-dark" id="inputPassword" placeholder="Password">
                </div>
                <div class="forgot">
                <a href="/reset">Forgot password?</a>
                </div>
                <button type="submit" class="btn btn-primary" style="color:goldenrod">Login</button>
            </form>
            </div>
        </div></div>
      @endsection
