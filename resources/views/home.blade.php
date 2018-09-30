
@extends('layouts.new')
<style>
  input[type='number']::-webkit-inner-spin-button,input[type='number']::-webkit-outer-spin-button{
    -webkit-appearance: none;
    margin: 0;
  }
</style>
@section('content')
<div class="container">
  <div class="well">
    <h1>Your Details</h1>
{!! Form::open(['action'=>'customerController@store', 'method'=>'POST']) !!}
        <div class="form-group">
            <p style="text-align:left"><strong>{{Form::label('id','User Id')}} :</strong></p>
            {{Form::text('id', Auth::user()->id ,['class'=>'form-control','placeholder'=>'User Id','readonly'])}}
          </div>
            <p style="text-align:left"><strong>{{Form::label('name','Name')}}  :</strong></p>
            {{Form::text('name', Auth::user()->name ,['class'=>'form-control','placeholder'=>'Name','readonly'])}}
          </div>
          <br>
          <div class="form-group">
            <p style="text-align:left"><strong>{{Form::label('address','Address')}} :</strong></p>
            {{Form::text('address','',['class'=>'form-control','placeholder'=>''])}}
          </div>
          <br>
          <div class="form-group">
            <p style="text-align:left"><strong>{{Form::label('contactNo','Contact Number')}} :</strong></p>
            {{Form::input('number','contactNo',null,['class'=>'form-control','placeholder'=>''])}}
          </div>
          <br>
          <div class="form-group">
              <p style="text-align:left"><strong>{{Form::label('email','Email Address')}} :</strong></p>
              {{Form::text('email', Auth::user()->email ,['class'=>'form-control','placeholder'=>'Email Address', 'readonly'])}}
            </div>
            <br>
            <div class="form-group float-right ">
            {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
            </div>
      {!! Form::close() !!}
  </div>
</div>
@endsection
