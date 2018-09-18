@extends('layouts.log')
@section('content')
<p style="text-align:right"><b style="color:darkslategray">---You are logged in as {{ strtoupper(Auth::user()->role) }}---</p>
<h1>You are already given your details</h1>
  <div class="container">
  {!! Form::open(['action'=>'customerController@store', 'method'=>'POST']) !!}
  <div class="form-group">
      <p style="text-align:left">{{Form::label('name','Name')}}</p>
      {{Form::text('name', Auth::user()->name ,['class'=>'form-control','placeholder'=>'Name','readonly'])}}
    </div>
  
    <div class="form-group" aria-readonly="true">
        <p style="text-align:left">{{Form::label('email','Email Address')}}</p>
        {{Form::text('email', Auth::user()->email ,['class'=>'form-control','placeholder'=>'Email Address', 'readonly'])}}
      </div>
{!! Form::close() !!}
</div>
@endsection
