@extends('layouts.app')
<style>
    .container{
      color: black;
    }
</style>
@section('content')
<div class="container" style="width:800px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border border-warning rounded" style="background-color:black">
                <div class="card-header" style="color:goldenrod"><h1 style="font-weight:bold">{{ __('Register') }}</h1></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
  
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-justify" style="color:goldenrod">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control border border-warning rounded bg-dark text-light{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-justify" style="color:goldenrod">{{ __('Address') }}</label>
                                <div class="col-md-6">
                                        <input id="address" input type="text" class="form-control border border-warning rounded bg-dark text-light" id="address" placeholder=" ">
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="contactNo" class="col-md-4 col-form-label text-md-justify" style="color:goldenrod">{{ __('Contact No') }}</label>
                                <div class="col-md-6">
                                        <input id="contactNo" input type="text" class="form-control border border-warning rounded bg-dark text-light" id="contactNo" placeholder=" ">
                                </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-justify" style="color:goldenrod">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control border border-warning rounded bg-dark text-light{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-justify" style="color:goldenrod">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control border border-warning rounded bg-dark text-light{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-justify" style="color:goldenrod">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control border border-warning rounded bg-dark text-light" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-warning" style="width:120px">
                                    {{ __('Register') }}
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