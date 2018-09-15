@extends('layouts.app')
<link rel="stylesheet" href="{{asset('my/l.css')}}">
@section('content')
<br><br>
<div class="container">
        <div class="login-form">
        <div class="main-div">
            <div class="panel">
           <h1>Login</h1>
           <p>Please enter your username and password</p>
           </div>
            <form id="Login">
        
                <div class="form-group">
        
        
                    <input type="text" class="form-control" id="inputUsername" placeholder="Username">
        
                </div>
        
                <div class="form-group">
        
                    <input type="password" class="form-control" id="inputPassword" placeholder="Password">
        
                </div>
                <div class="forgot">
                <a href="/reset">Forgot password?</a>
        </div>
                <button type="submit" class="btn btn-primary">Login</button>
        
            </form>
            </div>
        </div></div>
      @endsection
