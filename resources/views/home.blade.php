
 @extends('layouts.log')
@section('content')
@include('elements.homeContent')
<div class="container">
    <h1>Your Details</h1>
{!! Form::open(['action'=>'customerController@store', 'method'=>'POST']) !!}
        <div class="form-group">
            <p style="text-align:left">{{Form::label('name','Name')}}</p>
            {{Form::text('name', Auth::user()->name ,['class'=>'form-control','placeholder'=>'Name','readonly'])}}
          </div>
          <div class="form-group">
            <p style="text-align:left">{{Form::label('address','Address')}}</p>
            {{Form::text('address','',['class'=>'form-control','placeholder'=>'Address'])}}
          </div>
          <div class="form-group">
            <p style="text-align:left">{{Form::label('contactNo','Contact Number')}}</p>
            {{Form::text('contactNo','',['class'=>'form-control','placeholder'=>'Contact Number'])}}
          </div>
          <div class="form-group" aria-readonly="true">
              <p style="text-align:left">{{Form::label('email','Email Address')}}</p>
              {{Form::text('email', Auth::user()->email ,['class'=>'form-control','placeholder'=>'Email Address', 'readonly'])}}
            </div>
            <div class="form-group float-left">
            {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
            </div>
      {!! Form::close() !!}
      </div>
@endsection
