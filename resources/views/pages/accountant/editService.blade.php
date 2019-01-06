@extends('layouts.log')
@section('content')
<div class="container">
  <div class="well">
      {!! Form::open(['action'=>['ServicesController@update',$service->sid],'method'=>'POST']) !!}
      <div class="form-group">
        <div class="row">
        <div class="col-md-4 col-form-label text-md-right">
        <strong>{{Form::label('sid','Service Code')}} :</strong>
        </div>
        <div class="col-md-6">
        {{Form::text('sid', $service->sid ,['class'=>'form-control','placeholder'=>'','readonly'])}}
        </div>
      </div>
      </div>
      <div class="form-group">
        <div class="row">
        <div class="col-md-4 col-form-label text-md-right">
        <strong>{{Form::label('name','Service Name')}} :</strong>
        </div>
        <div class="col-md-6">
        {{Form::text('name', $service->name ,['class'=>'form-control','placeholder'=>''])}}
        </div>
      </div>
      </div>
      <div class="form-group">
        <div class="row">
        <div class="col-md-4 col-form-label text-md-right">
        <strong>{{Form::label('partsCost','Parts Cost')}} :</strong>
        </div>
        <div class="col-md-6">
        {{Form::number('partsCost', $service->partsCost ,['class'=>'form-control','placeholder'=>''])}}
        </div>
      </div>
      </div>
      <div class="form-group">
          <div class="row">
          <div class="col-md-4 col-form-label text-md-right">
          <strong>{{Form::label('serviceCharge','Service Charge')}} :</strong>
          </div>
          <div class="col-md-6">
          {{Form::number('serviceCharge', $service->serviceCharge ,['class'=>'form-control','placeholder'=>''])}}
          </div>
        </div>
        </div>
        <div class="form-group">
            <div class="row">
            <div class="col-md-4 col-form-label text-md-right">
            <strong>{{Form::label('totalAmount','Total Amount')}} :</strong>
            </div>
            <div class="col-md-6">
            {{Form::number('totalAmount', $service->totalAmount ,['class'=>'form-control','placeholder'=>''])}}
            </div>
          </div>
          </div>
        
      <div class="form-group">
        <div class="row">
        <div class="col-md-4 col-form-label text-md-right">
        <strong>{{Form::label('discount','Discount')}} :</strong>
        </div>
        <div class="col-md-6">
        {{Form::number('discount', $service->discount ,['class'=>'form-control','placeholder'=>''])}}
        </div>
      </div>
      </div>
        
          <br>
          <div class="form-group float-right form-inline " style="margin-right:180px;">
          <div class="form-group">
            {{Form::hidden('_method','PUT')}}
          {{Form::submit('Save',['class'=>'btn btn-success'] )}}
          </div>
          <div class="form-group">
              <a href="/services" class="btn btn-danger float-right " style="margin:5px"  id="cl" ><strong>Cancel</strong></a>
            </div>
          </div>
      {!! Form::close() !!}
  </div>
</div>  
@endsection