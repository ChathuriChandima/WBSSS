@extends('layouts.log')
@section('content')
<div class="container">
  <div class="well">
      {!! Form::open(['action'=>['customerController@updateCustomer'],'method'=>'POST']) !!}
      <div class="form-group">
        <div class="row">
        <div class="col-md-4 col-form-label text-md-right">
        <strong>{{Form::label('Id','ID')}} :</strong>
        </div>
        <div class="col-md-6">
        {{Form::text('Id', $customer->Id ,['class'=>'form-control','placeholder'=>'','readonly'])}}
        </div>
      </div>
      </div>
      <div class="form-group">
        <div class="row">
        <div class="col-md-4 col-form-label text-md-right">
        <strong>{{Form::label('name','Name')}} :</strong>
        </div>
        <div class="col-md-6">
        {{Form::text('name', $customer->name ,['class'=>'form-control','placeholder'=>''])}}
        </div>
      </div>
      </div>
      <div class="form-group">
        <div class="row">
        <div class="col-md-4 col-form-label text-md-right">
        <strong>{{Form::label('address','Address')}} :</strong>
        </div>
        <div class="col-md-6">
        {{Form::text('id', $customer->address ,['class'=>'form-control','placeholder'=>''])}}
        </div>
      </div>
      </div>
      <div class="form-group">
        <div class="row">
        <div class="col-md-4 col-form-label text-md-right">
        <strong>{{Form::label('contactNo','Contact No')}} :</strong>
        </div>
        <div class="col-md-6">
        {{Form::text('contactNo', $customer->contactNo ,['class'=>'form-control','placeholder'=>''])}}
        </div>
      </div>
      </div>
      <div class="form-group">
        <div class="row">
        <div class="col-md-4 col-form-label text-md-right">
        <strong>{{Form::label('email','Email')}} :</strong>
        </div>
        <div class="col-md-6">
        {{Form::text('id', $customer->email ,['class'=>'form-control','placeholder'=>''])}}
        </div>
      </div>
      </div>
      
        
          
          <br>
          <div class="form-group float-right form-inline " style="margin-right:180px;">
          <div class="form-group">
          {{Form::submit('Save',['class'=>'btn btn-success'] )}}
          </div>
          <div class="form-group">
              <a href="/customers" class="btn btn-danger float-right " style="margin:5px"  id="cl" ><strong>Cancel</strong></a>
            </div>
          </div>
      {!! Form::close() !!}
  </div>
</div>  
@endsection