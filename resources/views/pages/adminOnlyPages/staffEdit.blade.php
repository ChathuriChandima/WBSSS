@extends('layouts.log')
@section('content')
  <div class="container">
    <div class="well">
      {!! Form::open(['action'=>['staffController@updateStaff'],'method'=>'POST']) !!}
        <div class="form-group">
          <div class="row">
            <div class="col-md-4 col-form-label text-md-right">
              <strong>{{Form::label('Id','ID')}} :</strong>
            </div>
            <div class="col-md-6">
              {{Form::text('Id', $staff->id ,['class'=>'form-control','placeholder'=>'','readonly'])}}
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-4 col-form-label text-md-right">
              <strong>{{Form::label('name','Name')}} :</strong>
            </div>
            <div class="col-md-6">
              {{Form::text('name', $staff->name ,['class'=>'form-control','placeholder'=>''])}}
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-4 col-form-label text-md-right">
              <strong>{{Form::label('address','Address')}} :</strong>
            </div>
            <div class="col-md-6">
              {{Form::text('address', $staff->address ,['class'=>'form-control','placeholder'=>''])}}
            </div>
          </div>
        </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-4 col-form-label text-md-right">
            <strong>{{Form::label('contactNo','Contact No')}} :</strong>
          </div>
          <div class="col-md-6">
            {{Form::number('contactNo', '0'.$staff->contactNo ,['class'=>'form-control','placeholder'=>''])}}
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-4 col-form-label text-md-right">
            <strong>{{Form::label('email','Email')}} :</strong>
          </div>
          <div class="col-md-6">
            {{Form::email('email', $staff->email ,['class'=>'form-control','placeholder'=>''])}}
          </div>
        </div>
      </div>      
          
      <br>
      <div class="form-group float-right form-inline " style="margin-right:180px;">
        <div class="form-group">
          {{Form::submit('Save',['class'=>'btn btn-success'] )}}
        </div>
        <div class="form-group">
          <a href="/staff" class="btn btn-danger float-right " style="margin:5px"  id="cl" ><strong>Cancel</strong></a>
        </div>
      </div>
      {!! Form::close() !!}
    </div>
  </div>  
@endsection