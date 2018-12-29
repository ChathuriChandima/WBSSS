
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
            {{Form::text('id', Auth::user()->id ,['class'=>'form-control','placeholder'=>'','hidden'])}}
            {{Form::text('name', Auth::user()->name ,['class'=>'form-control','placeholder'=>'','hidden'])}}
          <div class="form-group">
              <div class="row">
                  <div class="col-md-4 col-form-label text-md-right">
            <strong>{{Form::label('address','Address')}} :</strong>
                  </div>
                  <div class="col-md-6">
            {{Form::text('address','',['class'=>'form-control','placeholder'=>''])}}
                  </div>
              </div>
          </div>
          <div class="form-group">
              <div class="row">
                  <div class="col-md-4 col-form-label text-md-right">
            <strong>{{Form::label('contactNo','Contact Number')}} :</strong>
                  </div>
                  <div class="col-md-6">
            {{Form::input('number','contactNo',null,['class'=>'form-control','placeholder'=>''])}}
                  </div>
              </div>
          </div>
              {{Form::text('email', Auth::user()->email ,['class'=>'form-control','placeholder'=>'Email Address', 'hidden'])}}
            <div class="form-group float-right ">
            {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
            </div>
      {!! Form::close() !!}
  </div>
</div>
@endsection
