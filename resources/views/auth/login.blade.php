@extends('layouts.app')
<style>
    .container{
      color: black;
    }
</style>
@section('content')
<div class="container " style="width:800px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border border-warning rounded" style="background-color:black">
                <div class="card-header" style="color:goldenrod"><h1 style="font-weight:bold">{{ __('Login') }}</h1></div>

                <div class="card-body">
                        <p style="color:white">Please enter your username and password</p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right" style="color:goldenrod">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control border border-warning rounded bg-dark text-light{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Username" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right" style="color:goldenrod">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control border border-warning rounded bg-dark text-light{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember" style="color:goldenrod">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                <a class="btn btn-link" style="color:goldenrod" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-warning " style="width:100px">
                            {{ __('Login') }}
                        </button>
                    </div>
                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
