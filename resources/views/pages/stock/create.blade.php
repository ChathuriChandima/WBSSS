@extends('layouts.log')
<style>
  input[type="number"]::-webkit-inner-spin-button,input[type="number"]::-webkit-outer-spin-button{
    -webkit-appearance: none;
    margin: 0;
  }
</style>
@section('content')
  <div class="container" style="margin-top:-60px;">
    <h2><img src="img\stock.jpg" style="height:100px; width:100px;">  New Stock </h2>
      <div class="well">
        {!! Form::open(['action'=>'stockController@store','method'=>'POST']) !!}
          <div class="form-group" >
            <div class="row">
              <div class="col-md-4 col-form-label text-md-right">
                <strong>{{Form::label('code','Stock Code')}} :</strong>
              </div>
              <div class="col-md-6">
                {{Form::text('code',$id,['class'=>'form-control','placeholder'=>'','readonly'])}}
              </div>
            </div>
          </div>
          <div class="form-group" >
            <div class="row">
              <div class="col-md-4 col-form-label text-md-right">
                <strong>{{Form::label('type','Type')}}  :</strong>
              </div>
              <div class="col-md-6">
                {{Form::text('type','',['class'=>'form-control','placeholder'=>''])}}
              </div>
            </div>
          </div>
          <div class="form-group" >
            <div class="row">
              <div class="col-md-4 col-form-label text-md-right">
                <strong>{{Form::label('name','Name')}}  :</strong>
              </div>
              <div class="col-md-6">
                {{Form::text('name','',['class'=>'form-control','placeholder'=>''])}}
              </div>
            </div>
          </div>
          <div class="form-group" >
            <div class="row">
              <div class="col-md-4 col-form-label text-md-right">
                <strong>{{Form::label('availableStock','Available Stock')}}  :</strong>
              </div>
              <div class="col-md-6">
                {{Form::number('availableStock','',['class'=>'form-control','placeholder'=>''])}}
              </div>
            </div>
          </div>
          <div class="form-group" >
            <div class="row">
              <div class="col-md-4 col-form-label text-md-right">
                <strong>{{Form::label('purchasedStock','Purchased Stock')}}  :</strong>
              </div>
              <div class="col-md-6">
                {{Form::number('purchasedStock','',['class'=>'form-control','placeholder'=>''])}}
              </div>
            </div>
          </div>
          <div class="form-group" >
            <div class="row">
              <div class="col-md-4 col-form-label text-md-right">
                <strong>{{Form::label('soldStock','Stock Sales')}}  :</strong>
              </div>
              <div class="col-md-6">
                {{Form::number('soldStock','',['class'=>'form-control','placeholder'=>''])}}
              </div>
            </div>
          </div>
          <div class="form-group" >
            <div class="row">
              <div class="col-md-4 col-form-label text-md-right">
                <strong>{{Form::label('price','Unit Price')}}  :</strong>
              </div>
              <div class="col-md-6">
                {{Form::number('price','',['class'=>'form-control','placeholder'=>''])}}
              </div>
            </div>
          </div>
          <div class="form-group float-right form-inline">
            <div class="form-group">
              {{Form::submit('Add',['class'=>'btn btn-success'] )}}
            </div>
            <div class="form-group">
              <a href="stocks" class="btn btn-danger float-right " style="margin:5px"  id="cl" ><strong>Cancel</strong></a>
            </div>
          </div>
      {!! Form::close() !!}
    </div>
</div>
@endsection
