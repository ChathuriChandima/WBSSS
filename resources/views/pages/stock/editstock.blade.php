@extends('layouts.log')
@section('content')
<div class="container">
  <div class="well">
      {!! Form::open(['action'=>['stockController@update',$stock->code],'method'=>'POST']) !!}
      <div class="form-group">
        <div class="row">
        <div class="col-md-4 col-form-label text-md-right">
        <strong>{{Form::label('code','Item Code')}} :</strong>
        </div>
        <div class="col-md-6">
        {{Form::text('code', $stock->code ,['class'=>'form-control','placeholder'=>'','readonly'])}}
        </div>
      </div>
      </div>
      <div class="form-group">
        <div class="row">
        <div class="col-md-4 col-form-label text-md-right">
        <strong>{{Form::label('name','Item Name')}} :</strong>
        </div>
        <div class="col-md-6">
        {{Form::text('name', $stock->name ,['class'=>'form-control','placeholder'=>''])}}
        </div>
      </div>
      </div>
      <div class="form-group">
        <div class="row">
        <div class="col-md-4 col-form-label text-md-right">
        <strong>{{Form::label('type','Type')}} :</strong>
        </div>
        <div class="col-md-6">
        {{Form::text('type', $stock->type ,['class'=>'form-control','placeholder'=>''])}}
        </div>
      </div>
      </div>
      <div class="form-group">
        <div class="row">
        <div class="col-md-4 col-form-label text-md-right">
        <strong>{{Form::label('availableStock','Available Stock')}} :</strong>
        </div>
        <div class="col-md-6">
        {{Form::number('availableStock', $stock->availableStock ,['class'=>'form-control','placeholder'=>''])}}
        </div>
      </div>
      </div>
      <div class="form-group">
        <div class="row">
        <div class="col-md-4 col-form-label text-md-right">
        <strong>{{Form::label('purchasedStock','Purchased Stock')}} :</strong>
        </div>
        <div class="col-md-6">
        {{Form::number('purchasedStock', $stock->purchasedStock ,['class'=>'form-control','placeholder'=>''])}}
        </div>
      </div>
      </div>
      <div class="form-group">
        <div class="row">
        <div class="col-md-4 col-form-label text-md-right">
        <strong>{{Form::label('soldStock','Sold Stock')}} :</strong>
        </div>
        <div class="col-md-6">
        {{Form::number('soldStock', $stock->soldStock ,['class'=>'form-control','placeholder'=>''])}}
        </div>
      </div>
      </div>
      <div class="form-group">
        <div class="row">
        <div class="col-md-4 col-form-label text-md-right">
        <strong>{{Form::label('price','Unit Price')}} :</strong>
        </div>
        <div class="col-md-6">
        {{Form::number('price', $stock->price ,['class'=>'form-control','placeholder'=>''])}}
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
              <a href="/stocks" class="btn btn-danger float-right " style="margin:5px"  id="cl" ><strong>Cancel</strong></a>
            </div>
          </div>
      {!! Form::close() !!}
  </div>
</div>  
@endsection