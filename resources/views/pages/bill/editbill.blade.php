@extends('layouts.log')
@section('content')
<!--edit a bill-->
<div class="container">
  <div class="well">
    {!! Form::open(['action'=>['billController@update',$bill->billNo],'method'=>'POST']) !!}
      <div class="form-group">
        <div class="row">
          <div class="col-md-4 col-form-label text-md-right">
            <strong>{{Form::label('billNo','Bill No')}} :</strong>
          </div>
          <div class="col-md-6 ">
            {{Form::text('billNo',$bill->billNo,['class'=>'form-control float-right','placeholder'=>'','readonly'])}}
          </div>
        </div>
    </div>
    <div class="form-group">
      <div class="row">
        <div class="col-md-4 col-form-label text-md-right">
          <strong>{{Form::label('date','Billed Date')}}  :</strong>
        </div>
        <div class="col-md-6">
          {{Form::text('date',$bill->date,['class'=>'form-control','placeholder'=>'','readonly'])}}
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="row">
        <div class="col-md-4 col-form-label text-md-right">
          <strong>{{Form::label('customerName','Customer Name')}}  :</strong>
        </div>
        <div class="col-md-6">
          {{Form::text('customerName',$bill->customerName,['class'=>'form-control','placeholder'=>'','readonly'])}}
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="row">
        <div class="col-md-4 col-form-label text-md-right">
          <strong>{{Form::label('vehicleNo','Vehicle No')}}  :</strong>
        </div>
        <div class="col-md-6">
          {{Form::text('vehicleNo',$bill->vehicleNo,['class'=>'form-control','placeholder'=>'','readonly'])}}
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="row">
        <div class="col-md-4 col-form-label text-md-right">
          <strong>{{Form::label('totalAmount','Total Amount')}}  :</strong>
        </div>
        <div class="col-md-6">
          {{Form::number('totalAmount','',['class'=>'form-control','placeholder'=>''])}}
        </div>
      </div>
    </div> 
    <div class="form-group">
      <div class="row">
        <div class="col-md-4 col-form-label text-md-right">
          <strong>{{Form::label('discount','Discount')}}  :</strong>
        </div>
        <div class="col-md-6">
          {{Form::number('discount','',['class'=>'form-control','placeholder'=>''])}}
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
        <a href="/bills" class="btn btn-danger float-right " style="margin:5px"  id="cl" ><strong>Cancel</strong></a>
      </div>
    </div>
    {!! Form::close() !!}
  </div>
</div>  
@endsection