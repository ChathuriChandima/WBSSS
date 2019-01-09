@extends('layouts.log')
@section('content')
<div class="container">
  <div class="well">
    {!! Form::open(['action'=>['salaryController@update'],'method'=>'POST']) !!}
  
  <div class="form-group">
    <div class="row">
      <div class="col-md-4 col-form-label text-md-right">
        <strong>{{Form::label('type','Employee Type')}} :</strong>
      </div>
      <div class="col-md-6">
        {{Form::text('type', $salaryDetail[0]->type ,['class'=>'form-control','placeholder'=>'','readonly'])}}
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="row">
      <div class="col-md-4 col-form-label text-md-right">
        <strong>{{Form::label('salary','Salary')}} :</strong>
      </div>
      <div class="col-md-6">
        {{Form::text('salary', $salaryDetail[0]->salary ,['class'=>'form-control','placeholder'=>''])}}
      </div>
    </div>
  </div>
      
  <br>
    <div class="form-group float-right form-inline " style="margin-right:180px;">
      <div class="form-group">
        {{Form::submit('Save',['class'=>'btn btn-success'] )}}
      </div>
      <div class="form-group">
        <a href="salary" class="btn btn-danger float-right " style="margin:5px"  id="cl" ><strong>Cancel</strong></a>
      </div>
    </div>
    
    {!! Form::close() !!}
  </div>
</div>  
@endsection