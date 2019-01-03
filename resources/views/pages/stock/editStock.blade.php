@extends('layouts.log')
@section('content')
<div class="container">
  <div class="well">
      {!! Form::open(['action'=>['stockController@update',$stock->code],'method'=>'POST']) !!}
      <form class="form-horizontal" role="form">
            <div class="form-group">
                <div class="row">
                <label class="control-label col-sm-4" style="text-align:right" for="code">Code:</label>
                <div class="col-sm-8">
                        {{Form::text('code', $stock->code ,['class'=>'form-control','placeholder'=>'','readonly'])}}
                </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row"> 
                <label class="control-label col-sm-4" style="text-align:right" for="name">Name:</label>
                <div class="col-sm-8">
                        {{Form::text('name', $stock->name ,['class'=>'form-control','placeholder'=>'','readonly'])}}
                </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                <label class="control-label col-sm-4" style="text-align:right" for="type">Type:</label>
                <div class="col-sm-8">
                        {{Form::text('type', $stock->type ,['class'=>'form-control','placeholder'=>'','readonly'])}}
                </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                <label class="control-label col-sm-4" style="text-align:right" for="purchasedStock">Purchased Stock:</label>
                <div class="col-sm-8">
                        {{Form::text('purchasedStock', $stock->purchasedStock ,['class'=>'form-control','placeholder'=>''])}}
                </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">        
                <label class="control-label col-sm-4" style="text-align:right" for="soldStock">Sold Stock:</label>
                <div class="col-sm-8">
                        {{Form::text('soldStock', $stock->soldStock ,['class'=>'form-control','placeholder'=>''])}}
                </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                <label class="control-label col-sm-4" style="text-align:right" for="availableStock">Available Stock:</label>
                <div class="col-sm-8">
                        {{Form::text('availableStock', $stock->availableStock ,['class'=>'form-control','placeholder'=>''])}}                        </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                <label class="control-label col-sm-4" style="text-align:right" for="price">Unit Price:</label>
                <div class="col-sm-8">
                        {{Form::text('price', $stock->price ,['class'=>'form-control','placeholder'=>''])}}                        </div>
                </div>
            </div>
         
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