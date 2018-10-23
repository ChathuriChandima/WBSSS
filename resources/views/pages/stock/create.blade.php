@extends('layouts.log')
<style>
  input[type="number"]::-webkit-inner-spin-button,input[type="number"]::-webkit-outer-spin-button{
    -webkit-appearance: none;
    margin: 0;
  }
</style>
@section('content')
            <h2><img src="img\stock.jpg">  New Stock </h2>
            <div class="container">
                <div class="well">
                    {!! Form::open(['action'=>'stockController@store','method'=>'POST']) !!}
                            <div class="form-group">
                                <p style="text-align:left"><strong>{{Form::label('code','Stock Code')}} :</strong></p>
                                {{Form::text('code','',['class'=>'form-control','placeholder'=>''])}}
                              </div>
                                <p style="text-align:left"><strong>{{Form::label('type','Type')}}  :</strong></p>
                                {{Form::text('type','',['class'=>'form-control','placeholder'=>''])}}
                              </div>
                              <div class="form-group" >
                                <p style="text-align:left"><strong>{{Form::label('name','Name')}}  :</strong></p>
                                {{Form::text('name','',['class'=>'form-control','placeholder'=>''])}}
                              </div>
                              <div class="form-group" >
                                  <p style="text-align:left"><strong>{{Form::label('availableStock','Available Stock')}}  :</strong></p>
                                  {{Form::text('availableStock','',['class'=>'form-control','placeholder'=>''])}}
                                </div>
                                <div class="form-group" >
                                        <p style="text-align:left"><strong>{{Form::label('purchasedStock','Purchased Stock')}}  :</strong></p>
                                        {{Form::text('purchasedStock','',['class'=>'form-control','placeholder'=>''])}}
                                      </div>
                                <div class="form-group" >
                                        <p style="text-align:left"><strong>{{Form::label('soldStock','Stock Sales')}}  :</strong></p>
                                                {{Form::text('soldStock','',['class'=>'form-control','placeholder'=>''])}}
                                        </div>
                                <div class="form-group" >
                                        <p style="text-align:left"><strong>{{Form::label('price','Unit Price')}}  :</strong></p>
                                                {{Form::text('price','',['class'=>'form-control','placeholder'=>''])}}
                                        </div>
                                <br>
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
